<template>
<div>
     <form id="msform" data-aos="fade-right">
     <form-wizard  title="New User" subtitle="First, we need some basic account information. But don't worry - you can always change your settings later."  @on-complete="onComplete"  shape="circle" color="#c04438">
      <tab-content title="Step 01" icon="fas fa-info" :before-change="firstStep">

        <div class="error text-danger" v-if="!$v.username.required && onclick2">Username Field is required</div>
        <div v-if="this.errors['username']">
            <span class="error text-danger">{{this.errors['username'][0]}}</span>
            <br>
        </div>
        <div class="error text-danger" v-if="!$v.username.minLength">Username must have at least {{$v.username.$params.minLength.min}} letters.</div>
        <input type="text" :class="{ 'form-group--error': $v.username.$error }"  v-model.trim="$v.username.$model" placeholder="Username" />
          <div v-if="this.errors['email']">
            <span class="error text-danger">{{this.errors['email'][0]}}</span>
            <br>
        </div>
        <!-- <div class="error text-danger" v-if="!$v.email">Email Field {{$v.email.$params.required}} .</div> -->
        <input type="text" :class="{ 'form-group--error': $v.email.$error }"  v-model.trim="$v.email.$model" placeholder="E-Mail Address" />


        <div class="error text-danger" v-if="!$v.password.required && onclick2">Password Field is required</div>
        <div class="error text-danger" v-if="!$v.password.minLength">Password must have at least {{$v.password.$params.minLength.min}} letters.</div>
        <input type="password" :class="{ 'form-group--error': $v.password.$error }"  v-model.trim="$v.password.$model" placeholder="Password" />


        <input type="text" name="text"  v-model="full_name" placeholder="First Name and Last Initial"/>
        <input type="tel" name="zip" v-model="zip_code"  placeholder="Zip Code"/>
      </tab-content>
      <tab-content title="Step 02" icon="fas fa-info" >
          <label for="">Select Age Range</label>
          <select class="form-control"  v-model="age_range">

            <option value="10-20">10 to 20</option>
            <option value="20-40">20 to 40</option>
            <option value="40-60">40-60</option>
          </select>
          <br>
            <label for="">Select Gender</label>
         <select class="form-control" v-model="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="Not Specified">Not Specified</option>
          </select>
          <br>

           <label for="">Select Covid-19 Status</label>
       <select class=" form-control"  v-model="status">


            <option value="positive">Positive</option>
            <option value="negative">Negative</option>
         </select>
      </tab-content>
      <tab-content title="Step 03" icon="fas fa-info">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
        <label class="form-check-label float-right mr-4" for="defaultCheck1">
          I Agree
        </label>
        </div>
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
         email:null,
         password:null,
         zip_code:null,

         onclick:false,
         onclick2:false,
         age_range:null,
         gender:null,
         status:null,
         errors:[],
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
        email:{
        required,
        },
    },
    methods: {
    onComplete: function() {
    this.onclick2=true;
    if(this.username.length>3 && this.password.length>5){
    let fromdata= new FormData();
        fromdata.append('username',this.username);
        fromdata.append("full_name",this.full_name);
        fromdata.append("password",this.password);
        fromdata.append("google_plus",this.google_plus);
        fromdata.append("facebook",this.facebook);
        fromdata.append("twitter",this.twitter);
        fromdata.append("email",this.email);
        fromdata.append("phone_number",this.phone_number);
        fromdata.append("age_range",this.age_range);
        fromdata.append("gender",this.gender);
        fromdata.append("status",this.status);
        axios.post(this.$hostapi_url+'/user/register',fromdata).then((res)=>{

            window.location.href=this.$base_url+"/congs";

        }) .catch((er) => {
              this.errors = er.response.data.errors;

            });
    }
    },
    firstStep(){
        this.onclick2=true;
        if(this.username.length>3 && this.password.length>5)
        {

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
