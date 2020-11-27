<template>
    <div>
        <div>
            <span v-if="value && (value.length > (maxlength/2))">({{value.length}}/{{maxlength}})</span>
        </div>
        <div class="input-form">
           <label class="custom-field three">
                <input :type="visibility" :maxlength='maxlength'  :value="value"  v-on:input="$emit('input', $event.target.value)"  autocomplete="on" required>
                <span :class="{'red': !!errors}" class="placeholder">{{placeholder}}</span>
                <span class="border"></span>
                    <!-- shows the password -->
                <button @click="showPassword"   v-if="visibility == 'password'" >
                    <Icon type="md-eye" size="32"/>
                </button>
                <!-- hides the password -->
                <button @click="hidePassword" v-if="visibility == 'text'">
                    <Icon type="md-eye-off" size="32"/>
                </button>
           </label>
        </div>
         <p class="error" v-if="!!errors">{{errors}}</p>
    </div>

</template>
<script>

export default {
    data () {
        return {
            visibility: 'password'
        }
    },
    props: {
        placeholder: {type: String, default: ''},
        value: '',
        maxlength: {type: Number, default: 30},
        onlyunder: {type: Boolean, default: false},
        errors:{},
    },
    methods: {
        showPassword(){
            this.visibility = 'text';
        },
        hidePassword() {
            this.visibility = 'password';
        }
    }
}
</script>
<style scoped>
    button{
        position: absolute;
        top:40%;
        left:80%;
        color:#303030;
    }

    .red{
        color: red;
    }

    .error{
        font-family: 'Poppins',sans-serif;
        color:red;
    }

</style>
