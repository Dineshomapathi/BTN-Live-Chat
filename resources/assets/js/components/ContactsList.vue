<template>
        <div class="contacts-list" id="mode">
            <ul onclick="document.getElementById('maindash').style.display='flex';document.getElementById('mode').style.display='none';return false;">
                <li v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{ 'selected': contact == selected }">
                    <div class="avatar" v-if="contact.name != null && contact.name != 'null'">
                        <vue-initials-img :name="contact.name"/>
                        <!-- <img src="/image/User.png"> -->
                    </div>
                    <div class="avatar" v-else>
                        <vue-initials-img :name="contact.loginotp"/>
                        <!-- <img src="/image/User.png"> -->
                    </div>
                    <div class="contact">
                        <p class="loginotp" style="font-size: medium;" v-if="contact.name != null && contact.name != 'null'">{{ contact.name }}</p>
                        <p class="loginotp" style="font-size: medium;" v-else>{{ contact.loginotp }}</p>
                        <p class="booth">{{ contact.project }}</p> 
                        <!--<p class="created_at">{{ contact.created_at }}</p> -->
                    </div>
                    <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
                </li>
            </ul>
        </div>
</template>

<script>
    import _ from 'lodash';

    export default {
        props: {
            contacts: {
                type: Array,
                default: []
            }
        },
        data() {
            return {
                isAutoSelected: false,
                selected: this.contacts.length ? this.contacts[0] : null
            };
        },
        mounted(){
        },
        methods: {
            selectContact(contact) {
                this.selected = contact;

                this.$emit('selected', contact);
            }
        },
        computed: {
            sortedContacts() {
                if(!this.isAutoSelected && this.contacts.length > 0){
                    this.isAutoSelected = true;
                    this.selectContact( _.find(this.contacts, {booth:localStorage.getItem('booth')}));
                }
                return _.sortBy(this.contacts, [(contact) => {
                    // if (contact == this.selected) {
                    //     return Infinity;
                    // }
                    
                    return contact.unread;
                }]).reverse();
            }
        }
    }
</script>

<style lang="scss" scoped>
@media (min-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */
#mode{
    display:none;
}

.contacts-list {
    flex: 2;
    max-height: 99.5vh;
    //height: 100%;
    overflow: auto;
    border-right: 1px solid #E43D30;
    
    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #E43D30;
            height: 80px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #dfdfdf;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 0;
                display: flex;
                align-items: center;

                img {
                    width: 50px;
                    border-radius: 50%;
                    margin: 0px 15px;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0px 15px;

                    &.created_at, &.loginotp, &.booth{
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
}
@media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
#mode{
    display:none;
}

.contacts-list {
    flex: 2;
    max-height: 99.5vh;
    //height: 100%;
    overflow: auto;
    border-right: 1px solid #E43D30;
    
    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #E43D30;
            height: 80px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #dfdfdf;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 0;
                display: flex;
                align-items: center;

                img {
                    width: 50px;
                    border-radius: 50%;
                    margin: 0px 15px;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                     margin: 0px 15px;

                    &.created_at, &.loginotp, &.booth{
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
}
@media (min-width:641px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
#mode{
    display:none;
}

.contacts-list {
    flex: 2;
    max-height: 99.5vh;
    //height: 100%;
    overflow: auto;
    border-right: 1px solid #E43D30;
    
    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #E43D30;
            height: 80px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #dfdfdf;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 0;
                display: flex;
                align-items: center;

                img {
                    width: 50px;
                    border-radius: 50%;
                    margin: 0px 15px;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                     margin: 0px 15px;

                    &.created_at, &.loginotp, &.booth{
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
}
@media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */
#mode{
    display:block !important;
}

.contacts-list {
    flex: 2;
    max-height: 99.5vh;
    //height: 100%;
    overflow: auto;
    border-right: 1px solid #E43D30;
    
    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #E43D30;
            height: 80px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #dfdfdf;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 0;
                display: flex;
                align-items: center;

                img {
                    width: 50px;
                    border-radius: 50%;
                    margin: 0px 15px;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                     margin: 0px 15px;

                    &.created_at, &.loginotp, &.booth{
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
}
@media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */
#mode{
    display:block !important;
}


.contacts-list {
    flex: 2;
    max-height: 99.5vh;
    //height: 100%;
    overflow: auto;
    border-right: 1px solid #E43D30;
    
    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #E43D30;
            height: 80px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #dfdfdf;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 0;
                display: flex;
                align-items: center;

                img {
                    width:50px;
                    border-radius: 50%;
                    margin: 0px 15px;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                    margin: 0px 15px;

                    &.created_at, &.loginotp, &.booth{
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
}
@media (min-width:1281px) { /* hi-res laptops and desktops */
#mode{
    display:block !important;
}

.contacts-list {
    flex: 2;
    max-height: 99.5vh;
    //height: 100%;
    overflow: auto;
    border-right: 1px solid #E43D30;
    
    ul {
        list-style-type: none;
        padding-left: 0;

        li {
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #E43D30;
            height: 80px;
            position: relative;
            cursor: pointer;

            &.selected {
                background: #dfdfdf;
            }

            span.unread {
                background: #82e0a8;
                color: #fff;
                position: absolute;
                right: 11px;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            .avatar {
                flex: 0;
                display: flex;
                align-items: center;

                img {
                    width: 50px;
                    border-radius: 50%;
                    margin: 0px 15px;
                }
            }

            .contact {
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p {
                     margin: 0px 15px;

                    &.created_at, &.loginotp, &.booth{
                        font-weight: bold;
                    }
                }
            }
        }
    }
}
}

/*
 *  STYLE 7
 */

#mode::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
	border-radius: 10px;
}

#mode::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

#mode::-webkit-scrollbar-thumb
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