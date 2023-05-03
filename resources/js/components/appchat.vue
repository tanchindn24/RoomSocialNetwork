<template>
    <main class="content">
        <div class="container p-0">
            <div class="card">
                <div class="row g-0 justify-content-center">
                    <div class="col-12 col-lg-12 col-xl-6">
                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                            <div class="d-flex align-items-center py-1">
                                <div class="position-relative">
                                    <img src="https://ptetutorials.com/images/user-profile.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                </div>
                                <div class="flex-grow-1 pl-20">
                                    <strong>{{userOnline.name}}</strong>
                                    <div class="text-muted small"><em>đang hoạt động</em></div>
                                </div>
                            </div>
                        </div>

                        <div class="h-50 d-inline-block position-relative col-12">
                            <div style="height: 450px" class="d-inline-block chat-messages col-12 pt-2">
                                <div v-for="message in list_messages">
                                    <div v-if="message.user.id == Auth.id" class="chat-message-right pb-4">
                                        <div>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                            <div class="font-weight-bold mb-1">{{Auth.name}}</div>
                                            {{message.message}}
                                        </div>
                                    </div>

                                    <div v-else-if="message.user.id !== Auth.id" class="chat-message-left pb-4">
                                        <div>
                                            <img src="https://ptetutorials.com/images/user-profile.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                            <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                        </div>
                                        <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                            <div class="font-weight-bold mb-1">{{message.user.name}}</div>
                                            {{message.message}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-grow-0 py-3 px-4 border-top">
                            <div class="input-group">
                                <input v-model="message" @keyup.enter="sendMessage" type="text" class="form-control" placeholder="Type your message">
                                <button @click="sendMessage" class="btn btn-primary">Send</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import axios from "axios";
import Echo from "laravel-echo";
let userId = document.querySelector("div[name='auth']").getAttribute('content');
let infomationAuth = JSON.parse(userId)

export default {
    // function data
    data() {
        // obj return
        return {
            Auth: infomationAuth,
            message: "",
            list_messages: [],
            userOnline : 0,
        }
    },
    methods: {
        sendMessage() {
            axios.post('/message', {message: this.message})
            this.message = ""
        }
    },
    mounted() {
        console.log('mounted channel')
        window.Echo.private('chatwithowner').listen('SendMessage', (user) => {
            this.userOnline = user
        }).listen('SendMessage',(event)=> {
            this.list_messages.push(event)
        })
    },
}
</script>

<style scoped>
body{margin-top:20px;}

.chat-online {
    color: #34ce57
}

.chat-offline {
    color: #e4606d
}

.chat-messages {
    display: flex;
    flex-direction: column;
    max-height: 800px;
    overflow-y: scroll
}

.chat-message-left,
.chat-message-right {
    display: flex;
    flex-shrink: 0
}

.chat-message-left {
    margin-right: auto
}

.chat-message-right {
    flex-direction: row-reverse;
    margin-left: auto
}
.py-3 {
    padding-top: 1rem!important;
    padding-bottom: 1rem!important;
}
.px-4 {
    padding-right: 1.5rem!important;
    padding-left: 1.5rem!important;
}
.flex-grow-0 {
    flex-grow: 0!important;
}
.border-top {
    border-top: 1px solid #dee2e6!important;
}
</style>
