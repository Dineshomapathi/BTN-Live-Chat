<template>
    <div class="conversation" id="maindash" v-if="contact != null">
        <div style="background: #0061A7;">
        <img onclick="document.getElementById('maindash').style.display='none';document.getElementById('mode').style.display='block';false;" src="/image/back_old.png" id="imgback">
        
        <h1 v-if="contact.name != null && contact.name != 'null'">{{ contact ? contact.name : 'Welcome to your inbox' }}</h1>
        <h1 v-else>{{ contact ? contact.loginotp : 'Welcome to your inbox' }}</h1>

        <h5>{{ contact ? contact.project : '' }}</h5>
        </div>
        <MessagesFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div>
    <div class="conversationlanding" v-else>
        <img src="/image/PGG_Logo_V3-01.png" style="width:80%;margin-bottom:30px;">
        <h1>Welcome to your inbox</h1>
        <h5>Please start a conversation with the developer in the virtual booth.</h5>
    </div>
</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(text) {
                if (!this.contact) {
                    return;
                }

                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    text: text
                }).then((response) => {
                    this.$emit('new', response.data);
                })
            }
        },
        components: {MessagesFeed, MessageComposer}
    }
</script>

<style lang="scss" scoped>
@media (min-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */ 
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1 {
            background: #E43D30;
            color: #fff;
            font-size: 20px;
            padding: 5px;
            margin: 0;
        }

        h5 {
            background: #E43D30;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            margin: 0;
        }
    }
    .conversationlanding {
        // display: none;
        flex: 5;
        height: 100%;
        font-style: oblique;
        display: flex;
        flex-direction: column;
        justify-content: center; /* vertically aligns items */
        align-items: center; /* horizontally aligns items */
        
        h1 {
            text-align: center;
        }

        h5 {
            text-align: center;
        }
    }
    #imgback{
        float: left;
        width: 40px;
        padding: 5px;
    }
}
@media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */ 
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1 {
            background: #E43D30;
            color: #fff;
            font-size: 20px;
            padding: 5px;
            margin: 0;
        }

        h5 {
            background: #E43D30;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            margin: 0;
        }
    }
    .conversationlanding {
        // display: none;
        flex: 5;
        height: 100%;
        font-style: oblique;
        display: flex;
        flex-direction: column;
        justify-content: center; /* vertically aligns items */
        align-items: center; /* horizontally aligns items */
    }
    #imgback{
        float: left;
        width: 40px;
        padding: 5px;
    }
}
@media (min-width:641px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */ 
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1 {
            background: #E43D30;
            color: #fff;
            font-size: 20px;
            padding: 5px;
            margin: 0;
        }

        h5 {
            background: #E43D30;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            margin: 0;
        }
    }
    .conversationlanding {
        // display: none;
        flex: 5;
        height: 100%;
        font-style: oblique;
        display: flex;
        flex-direction: column;
        justify-content: center; /* vertically aligns items */
        align-items: center; /* horizontally aligns items */
    }
    #imgback{
        float: left;
        width: 40px;
        padding: 5px;
    }
}
@media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */
#maindash{
  display: flex !important;  
}
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1 {
            background: #E43D30;
            color: #fff;
            font-size: 20px;
            padding: 5px;
            margin: 0;
        }

        h5 {
            background: #E43D30;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            margin: 0;
        }
    }
    .conversationlanding {
        flex: 5;
        height: 100%;
        font-style: oblique;
        display: flex;
        flex-direction: column;
        justify-content: center; /* vertically aligns items */
        align-items: center; /* horizontally aligns items */
    }
    #imgback{
        display: none;
        float: right;
        width: 98px;
        padding: 5px;
    }
}
@media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */
#maindash{
  display: flex !important;  
}
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1 {
            background: #E43D30;
            color: #fff;
            font-size: 20px;
            padding: 5px;
            margin: 0;
        }

        h5 {
            background: #E43D30;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            margin: 0;
        }
    }
    .conversationlanding {
        flex: 5;
        height: 100%;
        font-style: oblique;
        display: flex;
        flex-direction: column;
        justify-content: center; /* vertically aligns items */
        align-items: center; /* horizontally aligns items */
    }
    #imgback{
        display: none;
        float: right;
        width: 98px;
        padding: 5px;
    }
}
@media (min-width:1281px) { /* hi-res laptops and desktops */ 
#maindash{
  display: flex !important;  
}
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1 {
            background: #E43D30;
            color: #fff;
            font-size: 20px;
            padding: 5px;
            margin: 0;
        }

        h5 {
            background: #E43D30;
            color: #fff;
            font-size: 15px;
            padding: 5px;
            margin: 0;
        }
    }
    .conversationlanding {
        flex: 5;
        height: 100%;
        font-style: oblique;
        display: flex;
        flex-direction: column;
        justify-content: center; /* vertically aligns items */
        align-items: center; /* horizontally aligns items */
    }
    #imgback{
        display: none;
        float: right;
        width: 98px;
        padding: 5px;
    }
}

</style>