<template>
    <div class="chat-app2">
        <ContactsList2 :contacts="contacts" @selected="startConversationWith"/>
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
    </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList2 from './ContactsList2';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                selectedContact: null,
                messages: [],
                contacts: []
            };
        },
        mounted() {
            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e) => {
                    this.hanleIncoming(e.message);
                });

            axios.get('/contacts')
                .then((response) => {
                    this.contacts = response.data;
                });
            
            setInterval(() => {
                axios.get('/contacts')
                    .then((response) => {
                        this.contacts = response.data;
                    }); 
            },10000);

        },
        methods: {
            startConversationWith(contact) {                
                this.updateUnreadCount(contact, true);

                axios.get(`/conversation/${contact.id}`)
                    .then((response) => {
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })

            },
            saveNewMessage(message) {
                this.messages.push(message);
            },
            hanleIncoming(message) {
                if (this.selectedContact && message.from == this.selectedContact.id) {
                    this.saveNewMessage(message);

                    //audio notification for operator
                    const audio = new Audio('/audio/noti.mp3');
                    audio.play();

                    return;
                }

                this.updateUnreadCount(message.from_contact, false);
            },
            updateUnreadCount(contact, reset) {
                this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id) {
                        return single;
                    }

                    if (reset)
                        single.unread = 0;
                    else
                        single.unread += 1;

                    return single;
                })
            }
        },
        components: {Conversation, ContactsList2}
    }
</script>


<style lang="scss" scoped>
.chat-app2 {
    display: flex;
    border: 1px solid #E43D30;
}
</style>
