<template>
    <div class="feed" ref="feed" id="style-7">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message${message.to == contact.id ? ' sent' : ' received'}`" :key="message.id">
                <div class="text">
                    {{ message.text }}
                </div>
                <br>
                {{ message.created_at | formatDate}}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },
        methods: {
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        },
        mounted(){
            if(this.contact != null){
                this.scrollToBottom();
            }
            if(this.messages != null){
                this.scrollToBottom();
            } 
        },
        watch: {
            contact(contact) {
                this.scrollToBottom();
            },
            messages(messages) {
                this.scrollToBottom();
            }
        }
    }
</script>

<style lang="scss" scoped>
// .feed::-webkit-scrollbar { 
//     display: none;  /* Safari and Chrome */
// }

.feed {
    height: 100%;
    max-height: 800px;
    overflow: auto;
    // -ms-overflow-style: none;  /* Internet Explorer 10+ */
    // scrollbar-width: none;  /* Firefox */
	// overflow-y: scroll;

    ul {
        list-style-type: none;
        padding: 5px;
        

        li {
            &.message {
                margin: 10px 0;
                width: 100%;

                .text {
                    max-width: 200px;
                    border-radius: 5px;
                    padding: 12px;
                    display: inline-block;
                }

                &.received {
                    text-align: left;

                    .text {
                        border-radius: 16px 16px 16px 0;
                        background-color: #EEE;
                    }
                }

                &.sent {
                    text-align: right;

                    .text {
                        color: #FFFFFF;
                        border-radius: 16px 16px 0 16px;
                        background-color: #E43D30;
                    }
                }
            }
        }
    }
}

/*
 *  STYLE 7
 */

#style-7::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
	border-radius: 10px;
}

#style-7::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

#style-7::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-image: -webkit-gradient(linear,
									   left bottom,
									   left top,
									   color-stop(0.44, rgb(236,119,110)),
									   color-stop(0.72, rgb(233,99,89)),
									   color-stop(0.86, rgb(230,80,68)));
}
</style>

