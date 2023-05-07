<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col call-chat-sidebar col-sm-12">
                <div class="card">
                    <chat-list
                        :currentId="this.current_id"
                        @conversationSelected="loadSelectedConversation"
                    ></chat-list>
                </div>
            </div>
            <div class="col call-chat-body">
                <div class="card">
                    <chat-box
                        :currentId="this.current_id"
                        :selectedConversation="selectedConversation"
                    ></chat-box>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import chatList from "./ChatList.vue";
import chatBox from "./ChatBox.vue";
export default {
    name: "ProviderApp",
    components: {
        chatList,
        chatBox,
    },
    props: {
        current_id: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            selectedConversation: null,
            callOnlyGetChatList: false,
        }
    },
    methods: {
        loadSelectedConversation(chat) {
            this.selectedConversation = chat
        },
        onlyGetChatList() {
            this.callOnlyGetChatList =! this.callOnlyGetChatList
        }
    }
}
</script>

<style scoped>

</style>
