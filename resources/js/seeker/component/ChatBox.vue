<template>
    <div class="chatbox">
        <div v-if="selectedConversation" class="modal-dialog-scrollable">
            <div class="modal-content">
                <div class="msg-head">
                    <div class="row">
                        <div class="col-8">
                            <div class="d-flex align-items-center">
                                                    <span class="chat-icon"><img class="img-fluid"
                                                                                 src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg"
                                                                                 alt="image title"></span>
                                <div class="flex-shrink-0">
                                    <img
                                        style="margin-right: 5px; width:40px; height:40px;border-radius: 50px"
                                        :src="'/assets/backend/provider/assets/images/avatar/'+selectedConversation.avatar"
                                        class="img-fluid"
                                        alt="user img">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h3>{{ selectedConversation.name }}</h3>
                                    <p>Chủ Trọ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body" ref="chatbox_scoll" @scroll="onScroll" id="currentChat">
                    <div class="msg-body">
                        <ul>
                            <template v-for="(message) in conversation_message" :key="message.conversation_message">
                                <li v-show="compoundDate(message)">
                                    <div class="divider">
                                        <h6>{{ formatDate(message.created_at) }}</h6>
                                    </div>
                                </li>
                                <li :class="{'sender': message.type === 2, 'reply': message.type === 3}">
                                    <template v-if="message.message !== null">
                                        <p> {{ message.message }} </p>
                                        <span v-if="message.created_at !== null" class="time">
                                            {{
                                                new Date(message.created_at.seconds*1000 + message.created_at.nanoseconds/1000000)
                                                    .toLocaleTimeString('vi-VN', { timeZone: 'Asia/Ho_Chi_Minh', hour: '2-digit', minute:'2-digit' })
                                            }}
                                        </span>
                                    </template>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>

                <div class="send-box">
                    <form @submit.prevent>
                        <input
                            v-model="message" maxlength="1000" @keyup.enter="sendMessage"
                            type="text" class="form-control" aria-label="message…">
                        <button @click="sendMessage" type="button">
                            Send
                        </button>
                    </form>
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
                .where('seeker_id', '==', this.currentId)
                .where('provider_id', '==', this.selectedConversation.provider_id)
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
                    .where('seeker_id', '==', this.currentId)
                    .where('provider_id', '==', newValConversation.provider_id)
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
                .where('seeker_id', '==', this.currentId)
                .where('provider_id', '==', this.selectedConversation.provider_id)
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
                    type: 3,
                    seeker_id: this.currentId,
                    provider_id: this.selectedConversation.provider_id
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
