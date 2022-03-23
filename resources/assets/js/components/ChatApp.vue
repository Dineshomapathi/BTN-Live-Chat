<template>
    <div class="chat-app">
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage" />
    </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';

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
                contacts: [],
                value: 0
            };
        },
        mounted() {
            // axios.get('/notification/'+this.user.loginotp)
            // .then((response) => {
            //     this.value = response.data;
            // });

            this.count();

            var that = this;
            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e) => {
                    this.hanleIncoming(e.message);
                    
                    axios.get('/notification/'+this.user.loginotp)
                    .then((response) => {
                        that.value = response.data;
                    });
                    
                    axios.get('/contacts')
                    .then((response) => {
                        this.contacts = response.data;
                    });

                    window.top.postMessage({
                        title: 'show_notification',
                        data: this.user.loginotp,
                        value: this.value + 1
                    }, '*');
                });

            axios.get('/contacts')
                .then((response) => {
                    this.contacts = response.data;
                });
            
            // setInterval(() => {
            //     axios.get('/contacts')
            //         .then((response) => {
            //             this.contacts = response.data;
            //         }); 
            // },10000);

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
            async count(){
                const res = await axios.get('/notification/'+this.user.loginotp);
                this.value = res.data;
            },
            saveNewMessage(message) {
                this.messages.push(message);
            },
            hanleIncoming(message) {
                if (this.selectedContact && message.from == this.selectedContact.id) {
                    this.saveNewMessage(message);

                    //audio notification for user
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
        components: {Conversation, ContactsList}
    }
</script>


<style lang="scss" scoped>
.chat-app {
    display: flex;
    border: 1px solid #E43D30;
}
</style>
