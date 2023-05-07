<template>
    <div class="card-body p-0">
        <div v-if="selectedConversation" class="row chat-box">
            <!-- Chat right side start-->
            <div class="col pe-0 chat-right-aside">
                <!-- chat start-->
                <div class="chat">
                    <!-- chat-header start-->
                    <div class="chat-header clearfix">
                        <img class="rounded-circle"
                             :src="'/assets/backend/seeker/imgs/avatar/'+selectedConversation.avatar" alt="">
                        <div class="about">
                            <div class="name">{{ selectedConversation.name }}</div>
                            <div class="status">{{ selectedConversation.last_message }}
                                {{
                                    new Date(selectedConversation.createdAt)
                                        .toLocaleTimeString('vi-VN', { timeZone: 'Asia/Ho_Chi_Minh', hour: '2-digit', minute:'2-digit' })
                                }}
                            </div>
                        </div>
                        <ul class="list-inline float-start float-sm-end chat-menu-icons">
                            <li class="list-inline-item"><a href="#"><i class="icon-search"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="icon-clip"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="icon-headphone-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="icon-video-camera"></i></a></li>
                            <li class="list-inline-item toogle-bar"><a href="#"><i class="icon-menu"></i></a></li>
                        </ul>
                    </div>
                    <!-- chat-header end-->
                    <div class="chat-history chat-msg-box custom-scrollbar" ref="chatbox_scoll" @scroll="onScroll" id="currentChat">
                        <ul>
                            <template v-for="(message) in conversation_message" :key="message.conversation_message">
                                <li v-show="message.type === 3">
                                    <div :class="{ 'message my-message':message.type === 3}" style="background-color: #e1e0e0">
                                        <div :class="{ 'message-data text-end':message.type === 3}">
                                            <span class="message-data-time">
                                                {{
                                                    new Date(message.created_at.seconds*1000 + message.created_at.nanoseconds/1000000)
                                                        .toLocaleTimeString('vi-VN', { timeZone: 'Asia/Ho_Chi_Minh', hour: '2-digit', minute:'2-digit' })
                                                }}
                                            </span>
                                        </div>
                                        {{ message.message }}
                                    </div>
                                </li>
                                <li v-show="message.type === 2" :class="{'clearfix': message.type === 2}">
                                    <div :class="{ 'message other-message pull-right':message.type === 2}"
                                         style="background-color: #5252fb;color: #ffffff;text-align: right">
                                        <div :class="{ 'message-data':message.type === 2}">
                                            <span class="message-data-time"
                                                  style="color: #ffffff;float: left;">
                                                {{
                                                    new Date(message.created_at.seconds*1000 + message.created_at.nanoseconds/1000000)
                                                        .toLocaleTimeString('vi-VN', { timeZone: 'Asia/Ho_Chi_Minh', hour: '2-digit', minute:'2-digit' })
                                                }}
                                            </span>
                                        </div>
                                        {{ message.message }}
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <!-- end chat-history-->
                    <div class="chat-message clearfix">
                        <div class="row">
                            <div class="col-xl-12 d-flex">
                                <div class="smiley-box bg-primary">
                                    <div class="picker"><i class="fa fa-smile-o"></i></div>
                                </div>
                                <div class="input-group text-box">
                                    <input @keyup.enter="sendMessage" v-model="message" class="form-control input-txt-bx" id="message-to-send" type="text" placeholder="Type a message......">
                                    <button @click="sendMessage" class="input-group-text btn btn-primary" type="button">SEND</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end chat-message-->
                    <!-- chat end-->
                    <!-- Chat right side ends-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import firebase from "firebase/compat/app";

export default {
    name: "ChatBox",
    props: {
        currentId: String,
        selectedConversation: Object,
    },
    data() {
        return {
            message: this.message,
            conversation_message: [],
            loadedNumber: 10,
            scrollTopCount: 0,
            currentTotal: 0,
            currentPage: 1,
            newMessageArrived: 0,
            lastPage: 1,
            currentDate: null,
        }
    },
    watch: {
        selectedConversation(newValue, oldValue) {
            if (newValue !== null) {
                this.loadMessages(this.loadedNumber, this.currentPage, newValue, oldValue)
            }
        }
    },
    updated() {
        this.$nextTick(() => this.scrollToEnd())
    },
    methods: {
        moveTo() {
            let to = this.$refs.chatbox_scoll.offsetTop - 60
            window.scroll({
                top: to,
                left: 0,
                behavior: 'smooth'
            })

            this.moveToDown = !this.moveToDown
        },
        scrollToEnd: function () {
            document.getElementById("currentChat").scrollTop = document.getElementById("currentChat").scrollHeight;
        },
        onScroll(e) {
            const {scrollTop, offsetHeight, scrollHeight} = e.target
            if ((scrollTop + offsetHeight) >= scrollHeight) {
                console.log("vao: LoadScrollBottom")
            }

            if (scrollTop < 1) {
                console.log(`currentPage: ${this.currentPage} < lastPage: ${this.lastPage}`)
                this.loadMoreMessages()

                if (this.currentPage <= this.lastPage) {
                    this.loadMessages(this.newMessageArrived+this.loadedNumber, this.currentPage, this.selectedConversation, this.selectedConversation)
                }
            }
        },
        compoundDate(message) {
            if (message.created_at !== null && message.is_deleted === false) {
                const messageDate = new Date(message.created_at.seconds * 1000 + message.created_at.nanoseconds / 1000000);
                const prevMessage = this.conversation_message[this.conversation_message.indexOf(message) - 1];

                if (!prevMessage) {
                    this.currentDate = messageDate.toDateString();
                    return true;
                }

                const prevMessageDate = new Date(prevMessage.created_at.seconds * 1000 + prevMessage.created_at.nanoseconds / 1000000);

                if (messageDate.toDateString() !== prevMessageDate.toDateString() && message.is_deleted===false) {
                    this.currentDate = messageDate.toDateString();
                    return true;
                }

                return false;
            }
        },
        formatDate(createdAt) {
            if (createdAt !== null) {
                const date = new Date(createdAt.seconds*1000 + createdAt.nanoseconds/1000000)
                const options = {timeZone: 'Asia/Ho_Chi_Minh',
                    weekday: 'long',
                    day: 'numeric', month: 'numeric', year: 'numeric'}

                return date.toLocaleDateString('vi-VN', options);
            }
        },
        async loadMoreMessages() {
            let count = 0;
            await db.collection("conversation_message")
                .where('provider_id', '==', this.currentId)
                .where('seeker_id', '==', this.selectedConversation.seeker_id)
                .where('is_deleted', '==', false)
                .get().then(function(querySnapshot) {
                    count = querySnapshot.size
                });
            this.lastPage = Math.floor(count / this.loadedNumber)
            this.currentTotal = count
        },
        async loadMessages(number, page, newValConversation, oldValConversation) {
            try {
                const messageQuery = await db.collection('conversation_message')
                    .where('provider_id', '==', this.currentId)
                    .where('seeker_id', '==', newValConversation.seeker_id)
                    .where('is_deleted' , '==', false)
                    .orderBy('created_at', 'desc').limit(number)

                this.unsubscribe = messageQuery.onSnapshot((snapshot) => {
                    this.conversation_message = snapshot.docs
                        .map(doc => {
                            const data = doc.data()
                            return {
                                id: doc.id,
                                ...data,
                                avatar: this.selectedConversation.avatar
                            };
                        })
                        .reverse()
                    if (newValConversation !== oldValConversation) {
                        this.currentPage = 1
                    } else {
                        this.currentPage = page + 1
                        this.newMessageArrived = snapshot.docs.length
                    }
                    this.newMessageArrived = snapshot.docs.length
                })
            } catch (error) {
                console.log(error)
            }
        },
        async sendMessage() {
            let resultConversationId = '';

            const getConversationId = await db.collection('conversation')
                .where('provider_id', '==', this.currentId)
                .where('seeker_id', '==', this.selectedConversation.seeker_id)
                .limit(1).get()
            getConversationId.forEach((doc) => {
                resultConversationId = doc.data().id
            })

            const timestamp = firebase.firestore.FieldValue.serverTimestamp()

            if (this.message !== undefined && this.message !== '') {
                await db.collection('conversation_message').add({
                    conversation_id: resultConversationId,
                    created_at: timestamp,
                    file_attach: null,
                    message: this.message,
                    is_deleted: false,
                    is_provider_seen: false,
                    is_seeker_seen: false,
                    stamp: null,
                    type: 2,
                    provider_id: this.currentId,
                    seeker_id: this.selectedConversation.seeker_id
                })
                this.message = ''
                const updateConversationPromise = db.collection('conversation').doc(this.selectedConversation.documentId)
                    .update({
                        updated_at: timestamp
                    })
                try {
                    await updateConversationPromise
                    console.log('Conversation updated')
                } catch (error) {
                    console.error(error)
                }
            }
        },
    }
}
</script>

<style scoped>

</style>
