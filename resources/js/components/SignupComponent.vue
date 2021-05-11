<template>
<div>
     <form id="msform" data-aos="fade-right">
     <form-wizard  @on-complete="onComplete"  shape="circle" color="#c04438">
      <tab-content title="Step 01" icon="fas fa-info" :before-change="firstStep">
      <div class="error text-danger" v-if="!$v.first_name.required && onclick">First Name Field is required</div>
       <div class="error text-danger" v-if="!$v.first_name.minLength">First Name must have at least {{$v.first_name.$params.minLength.min}} letters.</div>
        <input type="text" :class="{ 'form-group--error': $v.first_name.$error }" v-model.trim="$v.first_name.$model" placeholder="First Name"  />

        <div class="error text-danger" v-if="!$v.last_name.required && onclick">Last Name Field is required</div>
        <div class="error text-danger" v-if="!$v.last_name.minLength">Last Name must have at least {{$v.last_name.$params.minLength.min}} letters.</div>
         <input type="text" :class="{ 'form-group--error': $v.last_name.$error }"  v-model.trim="$v.last_name.$model" placeholder="Last Name"  required/>

        <div class="error text-danger" v-if="!$v.phone_number.required && onclick">Phone Number Field is required</div>
        <div class="error text-danger" v-if="!$v.phone_number.minLength">Phone Number must have at least {{$v.phone_number.$params.minLength.min}} letters.</div>
        <input type="text" :class="{ 'form-group--error': $v.phone_number.$error }"   v-model.trim="$v.phone_number.$model" placeholder="Phone" />

      </tab-content>
      <tab-content title="Step 02" icon="fas fa-info" >
         <input type="text" name="twitter" v-model="twitter" placeholder="Twitter"/>
         <input type="text" name="facebook" v-model="facebook" placeholder="Facebook"/>
         <input type="text" name="gplus" v-model="google_plus" placeholder="Google Plus"/>
      </tab-content>
      <tab-content title="Step 03" icon="fas fa-info">


        <div class="error text-danger" v-if="!$v.username.required && onclick2">Username Field is required</div>
        <div class="error text-danger" v-if="!$v.username.minLength">Username must have at least {{$v.username.$params.minLength.min}} letters.</div>
        <input type="text" :class="{ 'form-group--error': $v.username.$error }"  v-model.trim="$v.username.$model" placeholder="Username" />

        <div class="error text-danger" v-if="!$v.password.required && onclick2">Password Field is required</div>
        <div class="error text-danger" v-if="!$v.password.minLength">Password must have at least {{$v.password.$params.minLength.min}} letters.</div>
        <input type="password" :class="{ 'form-group--error': $v.password.$error }"  v-model.trim="$v.password.$model" placeholder="Password" />


        <input type="text" name="text"  v-model="full_name" placeholder="First Name and Last Initial"/>
        <input type="tel" name="zip" v-model="zip"  placeholder="Zip Code"/>
      </tab-content>


    </form-wizard>
    </form>
</div>
</template>

<script>
import { required, minLength, between } from 'vuelidate/lib/validators'

export default {
    name:"signup-component",
    data(){
        return {

         first_name:null,
         last_name:null,
         phone_number:null,
         google_plus:null,
         facebook:null,
         twitter:null,
         username:null,
         full_name:null,
         password:null,
         zip:null,

         onclick:false,
         onclick2:false,
        };
    },
    validations: {
        first_name: {
        required,
        minLength: minLength(3)
        },
        last_name: {
        required,
        minLength: minLength(3)
        },
        phone_number: {
        required,
        minLength: minLength(6)
        },
        username: {
        required,
        minLength: minLength(5)
        },
        password: {
        required,
        minLength: minLength(6)
        },
    },
    methods: {
    onComplete: function() {
    this.onclick2=true;
    if(this.username.length>3 && this.password.length>5){
        alert("done");
    }
    },
    firstStep(){
        this.onclick=true;
        if(this.first_name && this.last_name  && this.phone_number)
        {
            this.full_name=this.first_name+" "+this.last_name;
            return true;
        }

        else
        return false;
    },

  }
}
</script>

<style>

</style>
