<template>
    <default-field :field="field">
        <template slot="field">
            <div style="display: flex">
                <input :id="field.name" type="text"
                       class="w-full form-control form-input form-input-bordered"
                       :class="errorClasses"
                       :placeholder="field.name"
                       v-model="value"/>
                <input type="button" class="button"  value="***" v-on:click="generate();">
                <div class="tooltip">
                    <button type="button" class="copyButtton" v-on:click="copyPassword()">
                        <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                        Copy
                    </button>
                </div>
            </div>
            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    methods: {
        generate() {
            var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
            var pass = "";
            var length = 10;
            if (this.field.length > 0){
                length = this.field.length;
            }
            for (var x = 0; x < length; x++) {
                var i = Math.floor(Math.random() * chars.length);
                pass += chars.charAt(i);
            }
            this.value = pass;
        },
        copyPassword() {
            var copyText = document.getElementById(this.field.name);
            var tooltip = document.getElementById("myTooltip");
            if (copyText.value.length > 0) {
                copyText.select();
                document.execCommand("copy");
                tooltip.innerHTML = "Copied";
            }
            else{
                tooltip.innerHTML = "Generate a password first";
            }
        },
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
          this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
          formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
          this.value = value
        }
    }
}
</script>
