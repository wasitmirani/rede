<template>
    <div>

                <h1 class="font-semibold lg:mb-6 mb-3 text-2xl"> Messages Inbox</h1>

                <div class="lg:flex lg:shadow lg:bg-white lg:space-y-0 space-y-8 rounded-md lg:-mx-0 -mx-5 overflow-hidden lg:dark:bg-gray-800">
                    <!-- left message-->
                    <div class="lg:w-4/12 bg-white border-r overflow-hidden dark:bg-gray-800 dark:border-gray-600">

                        <!-- search-->
                        <div class="border-b px-4 py-4 dark:border-gray-600">
                            <div class="bg-gray-100 input-with-icon rounded-md dark:bg-gray-700">
                                <input id="autocomplete-input" type="text" placeholder="Search" class="bg-transparent max-h-10 shadow-none">
                                <i class="icon-material-outline-search"></i>
                            </div>
                        </div>

                        <!-- user list-->
                        <div class="pb-16 w-full">
                            <ul class="dark:text-gray-100">
                                <li v-for="item in conversations" :key="item.id">
                                    <a role="button" @click="getConversation(item)" class="block flex items-center py-3 px-4 space-x-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <div class="w-12 h-12 rounded-full relative flex-shrink-0">
                                            <img :src="getImg('profile.jpg')" alt="" class="absolute h-full rounded-full w-full">
                                            <span class="absolute bg-green-500 border-2 border-white bottom-0 h-3 m-0.5 right-0 rounded-full shadow-md w-3"></span>
                                        </div>
                                        <div class="flex-1 min-w-0 relative text-gray-500">
                                            <h4 class="text-black font-semibold dark:text-white">{{getName(item).substr(0,10)}}</h4>
                                            <span class="absolute right-0 top-1 text-xs">{{dateFormate(item.created_at)}}</span>
                                            <p class="truncate">{{messageLimit(item.message.message)}}</p>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <!--  message-->
                    <div class="lg:w-8/12 bg-white dark:bg-gray-800">

                        <div class="px-5 py-4 flex uk-flex-between">

                            <!-- <a href="#" class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="assets/images/avatars/avatar-1.jpg" alt="" class="h-full rounded-full w-full">
                                    <span class="absolute bg-green-500 border-2 border-white bottom-0 h-3 m-0.5 right-0 rounded-full shadow-md w-3"></span>
                                </div>
                                <div class="flex-1 min-w-0 relative text-gray-500">
                                    <h4 class="font-semibold text-black text-lg">Sindy Forest</h4>

                                    <p class="font-semibold leading-3 text-green-500 text-sm">is online</p>
                                </div>
                            </a>

                            <a href="#" class="flex hover:text-red-400 items-center leading-8 space-x-2 text-red-500 font-medium">
                                <i class="uil-trash-alt"></i> <span class="lg:block hidden"> Delete Conversation </span>
                            </a> -->
                        </div>

                        <div class="border-t dark:border-gray-600" style="overflow-y: auto;height: 400px;">

                            <div class="lg:p-8 p-4 space-y-5" v-for="item in messages" :key="item.id" >



                                <!-- <h3 class="lg:w-60 mx-auto text-sm uk-heading-line uk-text-center lg:pt-2"><span> 28 June, 2018 </span></h3> -->

                                <div class="flex lg:items-center" v-if="item.sender_id!=auth_user.id">
                                    <div class="w-14 h-14 rounded-full relative flex-shrink-0">
                                        <img :src="getImg('profile.jpg')" alt="" class="absolute h-full rounded-full w-full">
                                    </div>
                                    <div class="text-gray-700 py-2 px-3 rounded bg-gray-100 h-full relative lg:ml-5 ml-2 lg:mr-20 dark:bg-gray-700 dark:text-white">
                                        <p class="leading-6"> {{item.message}} </p>
                                        <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-700"></div>
                                    </div>
                                </div>
                                <div class="flex lg:items-center flex-row-reverse" v-else>
                                    <div class="w-14 h-14 rounded-full relative flex-shrink-0">
                                        <img :src="getImg('profile.jpg')" alt="" class="absolute h-full rounded-full w-full">
                                    </div>
                                    <div class="text-white py-2 px-3 rounded bg-blue-600 relative h-full lg:mr-5 mr-2 lg:ml-20">
                                        <p class="leading-6"> {{item.message}}  </p>
                                        <div class="absolute w-3 h-3 top-3 -right-1 bg-blue-600 transform rotate-45"></div>
                                    </div>
                                </div>

                                <!-- my message-->
                                <!-- <div class="flex lg:items-center flex-row-reverse" v-if="item.sender_id==auth_user.id & item.receiver_id==auth_user.id">
                                    <div class="w-14 h-14 rounded-full relative flex-shrink-0">
                                        <img :src="getImg('profile.jpg')" alt="" class="absolute h-full rounded-full w-full">
                                    </div>
                                    <div class="text-white py-2 px-3 rounded bg-blue-600 relative h-full lg:mr-5 mr-2 lg:ml-20">
                                        <p class="leading-6"> {{item.message}}  4</p>
                                        <div class="absolute w-3 h-3 top-3 -right-1 bg-blue-600 transform rotate-45"></div>
                                    </div>
                                </div> -->
                            </div>


                        </div>
                         <div class="border-t flex p-6 dark:border-gray-700">
                                <input type="text" v-model="message_body" placeholder="Your Message.." class="border-0 flex-1 h-10 min-h-0 resize-none min-w-0 shadow-none dark:bg-transparent" v-on:keyup.enter="sendMessage">
                                <div class="flex h-full space-x-2">
                                    <button type="submit" class="bg-blue-600 font-semibold px-6 py-2 rounded-md text-white" @click="sendMessage">Send</button>
                                </div>
                            </div>

                    </div>
                </div>

            </div>

</template>
<script>
export default {
name:"messages",
data(){
    return {
        users:[],
        message:null,
        message_body:null,
        auth_user:null,
        conversations:[],
        conversation_id:null,
        messages:[],
        receiver:{},
        info: [],
        online:[],
        typing:false,
        connectionCount: 0,
    };
},
methods:{
    // sendMessage() {
    //                 socket.emit('chat-message', {
    //                     message:  this.message_body,
    //                     receiver_id: this.receiver.id,
    //                     sender_id:this.auth_user.id,
    //                 }, this.receiver.name)
    //                 this.messages.push({
    //                     message: this.message_body,
    //                     receiver_id: this.receiver.id,
    //                     sender_id:this.auth_user.id,
    //                     by: this.auth_user.name
    //                 })
    //                 this.message_body = null
    //             },
    //              setName() {
    //                  console.log("recvi",this.receiver.name);
    //                 socket.emit('joined', this.receiver.name)

    //             },
  async sendMessage(){
         let formdata=new FormData();
        formdata.append('receiver_id',this.receiver.id);
        formdata.append('sender_id',this.auth_user.id);
        formdata.append('conversation_id',this.conversation_id);
        formdata.append('message',this.message_body);
     await   axios.post('message/send',formdata).then((res)=>{

                    axios.get('/message/messages/'+this.conversation_id).then((res)=>{
                                        this.messages=res.data;


                    });
                //    socket.emit('chat-message', {
                //         message: message,
                //         receiver_id:  this.receiver.id,
                //         sender_id:this.auth_user.id,
                //     }, this.receiver.name)
                    this.messages.push({
                        message: this.message_body,
                        receiver_id:  this.receiver.id,
                        sender_id:this.auth_user.id,
                        type: 0,
                        by: this.auth_user
                    })
                    this.message_body = null

                    console.log('sended success')

                });
   },

  async getConversation(item){
       if(item.get_user1.id!=user.id){
            this.receiver=item.get_user1;
             this.conversation_id=item.id;
       }
       if(item.get_user2.id!=user.id){
            this.receiver=item.get_user2;
            this.conversation_id=item.id;
       }
    this.setName();
     await  axios.get('/message/messages/'+item.id).then((res)=>{
           this.messages=res.data;
       });

   },
   getName(item){

       if(item.get_user1.id!=user.id){
           return item.get_user1.name;
       }
       if(item.get_user2.id!=user.id){
           return item.get_user2.name;
       }
   },
   dateFormate(val){
       return moment.utc(val).startOf('day').fromNow();
   },
   messageLimit(val){
       if(val.length>15){
           return val.substr(0,25)+"....";
       }
       return val;
   },
   getImg(val){
       return window.origin+"/assets/images/"+val;
   },
   async getConversations(){
       await axios.get('/conversations').then((res)=>{
            this.conversations=res.data;
       });
   }
},
  mounted() {
    window.onbeforeunload = () => {
      socket.emit("leaved", this.name);
    };
    // socket.on("noOfConnections", count => {
    //   this.connectionCount = count;
    // });
  },
  watch: {
    newmessage(value) {
      value ? socket.emit("typing", this.name) : socket.emit("stoptyping");
    }
  },
created(){
this.getConversations();
this.auth_user=user;

     socket.on('chat-message', (data) => {
         console.loog("newmsg",data);
                    this.messages.push({
                        message: data.message,
                        by: data.user
                    })
                    this.typing = false
                })


    socket.on("typing", data => {
      console.log(data);
      this.typing = data;
    });
    socket.on("stoptyping", () => {
      this.typing = false;
    });
    socket.on("leaved", name => {
      this.online.splice(this.online.indexOf(name));
      this.info.push({
        name: name,
        type: "Leaved"
      });
      setTimeout(() => {
        this.info = [];
      }, 5000);
    });
    socket.on("joined", name => {
      this.online.push(name);
      this.info.push({
        name: name,
        type: "Joined"
      });
      setTimeout(() => {
        this.info = [];
      }, 5000);
    });
// console.log(user);

}
}
</script>

<style>

</style>
