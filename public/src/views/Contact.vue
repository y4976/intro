<template>
    <div>
        <h2 class="section-title animation-translate-overline animation-item-1">Contact</h2>
        <div class="row mb-10 animation-translate animation-item-2">
            <div class="col-12 col-md-4">
                <div class="contact">
                    <strong class="contact-label">Stay in touch</strong>
                    <a :href="'mailto:'+user.email">{{user.email}}</a><br>
                    <a :href="'tel:'+user.phone">{{user.phone}}</a>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="contact">
                    <strong class="contact-label">Address</strong>
                    {{user.address}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-xl-9">
                <h3 class="section-subtitle animation-translate animation-item-3">Leave a message</h3>
                <div class="needs-validation animation-translate animation-item-4" novalidate="">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="contact-form-name">Name</label>
                                <input type="text" class="form-control" id="contact-form-name" placeholder="Your name" required="" v-model="item.name">
                                <div class="invalid-feedback">Please enter your name.</div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="contact-form-name">E-mail</label>
                                <input type="email" class="form-control" name="email" id="contact-form-email" placeholder="@" required="" v-model="item.email">
                                <div class="invalid-feedback">Please enter a valid e-mail address.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact-form-message">Message</label>
                        <textarea class="form-control" id="contact-form-message" placeholder="Your message" rows="5" required="" v-model="item.message"></textarea>
                        <div class="invalid-feedback">Please type some message.</div>
                    </div>
                    <button @click="sendMail" class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import User from "@/mixins/User";

    import communicator from "@/models/Communicator";

    export default {
        name: "Contact",
        mixins: [User],
        data() {
            return {
                item: {
                    name: '',
                    email: '',
                    message: '',
                }
            }
        },
        methods: {
            sendMail() {
                communicator.sendActionRequest('AddMessage', [{item: this.item}], () => {});
            }
        }
    }
</script>

<style scoped>

</style>