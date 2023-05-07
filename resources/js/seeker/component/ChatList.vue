<template>
    <div class="chatlist">
        <div class="modal-dialog-scrollable">
            <div class="modal-content">
                <div class="chat-header">
                    <div class="msg-search">
                        <input
                            v-model="searchUser"
                            type="text" class="form-control" id="inlineFormInputGroup"
                            placeholder="Search" aria-label="search">
                        <a class="add" href="#"><img class="img-fluid"
                                                     src="https://mehedihtml.com/chatbox/assets/img/add.svg"
                                                     alt="add"></a>
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Open-tab" data-bs-toggle="tab"
                                    data-bs-target="#Open" type="button" role="tab"
                                    aria-controls="Open" aria-selected="true">Conversations
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="modal-body">
                    <h5 v-show="this.noConversations === true">No conversations</h5>
                    <!-- chat-list -->
                    <div v-show="this.noConversations === false" class="chat-lists">
                        <div class="tab-content" id="myTabContent">
                            <div
                                v-for="(conversations, index) in filteredChatLists" :key="index"
                                @click="selectedConversation(conversations)"
                                class="tab-pane fade show active">
                                <!-- chat-list -->
                                <div class="chat-list">
                                    <a href="#" class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <img class="img-fluid"
                                                 style="margin-right: 5px; width:40px; height:40px;border-radius: 50px"
                                                 :src="'/assets/backend/provider/assets/images/avatar/'+conversations.avatar"
                                                 alt="user img">
                                            <span class="active"></span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h3>{{ conversations.name }}</h3>
                                            <p>{{ conversations.last_message }}</p>
                                        </div>
                                    </a>
                                </div>
                                <!-- chat-list -->
                            </div>
                        </div>

                    </div>
                    <!-- chat-list -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ChatList",
    props: {
        currentId: String,
    },
    data() {
        return {
            searchUser: "",
            conversations: [],
            selectedConversationId: null,
            noConversations: false,
            handleCallEventConversation: false,
        }
    },
    watch: {
        conversations: {
            handler: function (newConversations, oldConversations) {
                if (newConversations.length > 0) {
                    this.handleCallEventConversation = true
                    this.selectedConversationId = newConversations[0]
                    this.$emit("conversationSelected", this.selectedConversationId)
                }
            },
            deep: true,
            immediate: true // watcher run after component created
        },
    },
    beforeDestroy() {
        this.unsubscribe();
    },
    mounted() {
        try {
            const conversationQuery = db.collection('conversation')
                .where('seeker_id', '==', this.currentId)
            this.unsubscribe = conversationQuery.onSnapshot((snapshot) => {
                console.log("calling get chat list")
                this.getChatList()
            })
        } catch (e) {
            console.log(e)
        }
    },
    computed: {
        filteredChatLists() {
            if (this.searchUser.trim() === "") {
                return this.conversations;
            } else {
                return this.conversations.filter((chat) => {
                    return chat.name.toLowerCase().includes(this.searchUser.toLowerCase())
                });
            }
        },
    },
    methods: {
        formatTimeAgo(time) {
            switch (typeof time) {
                case 'number':
                    break;
                case 'string':
                    time = +new Date(time);
                    break;
                case 'object':
                    if (time.constructor === Date) time = time.getTime();
                    break;
                default:
                    time = +new Date();
            }
            const time_formats = [
                [60, 'seconds', 1], // 60
                [120, '1 minute ago', '1 minute from now'], // 60*2
                [3600, 'minutes', 60], // 60*60, 60
                [7200, '1 hour ago', '1 hour from now'], // 60*60*2
                [86400, 'hours', 3600], // 60*60*24, 60*60
                [172800, 'Yesterday', 'Tomorrow'], // 60*60*24*2
                [604800, 'days', 86400], // 60*60*24*7, 60*60*24
                [1209600, 'Last week', 'Next week'], // 60*60*24*7*4*2
                [2419200, 'weeks', 604800], // 60*60*24*7*4, 60*60*24*7
                [4838400, 'Last month', 'Next month'], // 60*60*24*7*4*2
                [29030400, 'months', 2419200], // 60*60*24*7*4*12, 60*60*24*7*4
                [58060800, 'Last year', 'Next year'], // 60*60*24*7*4*12*2
                [2903040000, 'years', 29030400], // 60*60*24*7*4*12*100, 60*60*24*7*4*12
                [5806080000, 'Last century', 'Next century'], // 60*60*24*7*4*12*100*2
                [58060800000, 'centuries', 2903040000] // 60*60*24*7*4*12*100*20, 60*60*24*7*4*12*100
            ];
            let seconds = (+new Date() - time) / 1000,
                token = 'ago',
                list_choice = 1;

            if (seconds === 0) {
                return 'Just now'
            }
            if (seconds < 0) {
                seconds = Math.abs(seconds);
                token = 'from now';
                list_choice = 2;
            }
            let i = 0,
                format;
            while (format = time_formats[i++])
                if (seconds < format[0]) {
                    if (typeof format[2] == 'string')
                        return format[list_choice];
                    else
                        return Math.floor(seconds / format[2]) + ' ' + format[1] + ' ' + token;
                }
            return time;
        },
        formatTime(value) {
            const date = new Date(value)
            const options = {timeZone: 'Asia/Ho_Chi_Minh', hour: '2-digit', minute:'2-digit'}

            return date.toLocaleTimeString('vi-VN', options)
        },
        getChatList() {
            axios.get('/seeker/conversation/chat-list')
                .then((response) => {
                    if (response.data.message === "No conversation") {
                        this.noConversations = true
                    } else {
                        const chatList = response.data.conversations.map(chat => {
                            return {
                                documentId: chat.id,
                                last_message: chat.last_message,
                                provider_id: chat.provider_id,
                                name: chat.name,
                                avatar: chat.avatar,
                                createdAt: new Date(chat.created_at),
                                unread: chat.unread
                            }
                        });
                        chatList.sort((a, b) => b.createdAt - a.createdAt);
                        this.conversations = chatList
                    }
                }).catch((error) => {
                    console.log(error)
            })
        },
        selectedConversation(chat) {
            this.$emit("conversationSelected", chat)
        }
    }
}
</script>

<style scoped>

</style>
