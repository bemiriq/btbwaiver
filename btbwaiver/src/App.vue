<template>

  <div id="app">
    <br>
    <div>
      <!-- <img alt="Vue logo" src="./assets/btb.png"> -->
      <a href="/"><img center src="./assets/btb.png" alt="BTB LOGO"></img></a>
    </div>

  <br><br>

  <div>
    <span style="font-size: 3em;">{{ greetings }}</span>
  </div>

  <hr>
   
<!--   <div>
    <span>{{ posts }}</span>
  </div> -->
 <!--  <ul>
    <li v-for="post is posts">{{ post }}</li>
  </ul> -->

  <div v-show="reservationTimeDiv">
    <span style="font-size: 2em;">{{ reservationTimeTitle }}</span>
    <!-- <BookingName msg="Please select your booking name"/> -->
    <b-row>
      <b-col md="auto">
        <!-- <b-time v-model="value" locale="en" @context="onContext"></b-time> -->
      </b-col>
      <b-col>
        <!-- <p>Value: <b>'{{ value }}'</b></p> -->
        <!-- <p class="mb-0">Context:</p> -->
        <!-- <pre class="small">{{ context }}</pre> -->
      </b-col>
    </b-row>

    <br>

    <div v-for="item in timeList" :key="timeList">
      <button>{{item}}</button>
    </div>

    <br>

    <b-button variant="outline-primary" v-on:click="reservationTimeDiv = !reservationTimeDiv,reservationNameDiv = !reservationNameDiv">DONT KNOW</b-button>

    <br> <br>

  </div>


  <!-- <b-button variant="outline-primary" v-on:click="reservationNameDiv = !reservationNameDiv">Button</b-button> -->

  <div v-show="!reservationNameDiv">
    <span style="font-size: 2em;">{{ reservationNameTitle }}</span>
      <!-- <ul>
        <li v-for="post in posts" :key="post.customerName">{{post.customerName}}</li>
      </ul> -->

      <div v-for="post in posts" :key="post.customerName">
        <button>{{post.customerName}}</button>
      </div>

    <br>

    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="reservationNameDiv = !reservationNameDiv, reservationTimeDiv = !reservationTimeDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
            <b-button variant="primary" v-on:click="reservationNameDiv = !reservationNameDiv, emailDiv = !emailDiv">NEXT</b-button>
        </b-col>

      </b-row>

    </b-container>


    <br> <br>
   
  </div>


  <div v-show="!emailDiv">
    <!-- <p>SAN 2</p> -->
    <br>
    <span style="font-size: 1.5em;">
      What is your Email ?
    </span>
    <br>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label-for="input-1"
        description="We will use this to send your bomb photos, Please make sure its correct."
      >
      </b-form-group>
        <b-form-input
          id="inline-form-input-name"
          class="mb-2 mr-sm-2 mb-sm-0"
          v-model="form.email"
          type="email"
          required
          placeholder="Enter email"
        ></b-form-input>

    <br>

    <span style="font-size: 1.5em;">
      Interested in getting promotional emails from Beat The Bomb?
    </span>

    <br><br>

    <b-form-radio-group
      v-model="selected"
      :options="options"
      class="mb-3"
      value-field="item"
      text-field="name"
    ></b-form-radio-group>

<!--       <b-form-group id="input-group-2" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.name"
          required
          placeholder="Enter name"
        ></b-form-input>
      </b-form-group> -->

      <!-- <b-form-group id="input-group-4">
        <b-form-checkbox-group v-model="form.checked" id="checkboxes-4">
          <b-form-checkbox value="me">Check me out</b-form-checkbox>
          <b-form-checkbox value="that">Check that out</b-form-checkbox>
        </b-form-checkbox-group>
      </b-form-group> -->

      <!-- <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button> -->
    </b-form>
    <!-- <b-card class="mt-3" header="Form Data Result">
      <pre class="m-0">{{ form }}</pre>
    </b-card> -->
    <br>

    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="emailDiv = !emailDiv, reservationNameDiv = !reservationNameDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
            <b-button variant="primary" v-on:click="emailDiv = !emailDiv, fullnameDiv = !fullnameDiv">NEXT</b-button>
        </b-col>
      </b-row>
    </b-container>
   
    <br> <br>

  </div>


  <div v-show="!fullnameDiv">
    <!-- <p>This is full name div </p> -->

    <br>

      <b-form v-if="show">

      <b-form-group
        id="input-group-1"
        label-for="input-1"
      >
      </b-form-group>
        <b-form-input
          id="inline-form-input-name"
          class="mb-2 mr-sm-2 mb-sm-0"
          v-model="form.firstname"
          type="text"
          required
          placeholder="Enter your first name"
        ></b-form-input>

        <b-form-group
        id="input-group-1"
        label-for="input-1"
      >
      </b-form-group>
        <b-form-input
          id="inline-form-input-name"
          class="mb-2 mr-sm-2 mb-sm-0"
          v-model="form.lastname"
          type="text"
          required
          placeholder="Enter your first name"
        ></b-form-input>

        <b-form-group
        id="input-group-1"
        label-for="input-1"
      >
      </b-form-group>
        <b-form-input
          id="inline-form-input-name"
          class="mb-2 mr-sm-2 mb-sm-0"
          v-model="form.dateofbirth"
          type="date"
          required
          placeholder="Enter your first name"
        ></b-form-input>
      </b-form>

      <br>

    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="fullnameDiv = !fullnameDiv, emailDiv = !emailDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
            <b-button variant="primary" v-on:click="fullnameDiv = !fullnameDiv, genderDiv = !genderDiv">NEXT</b-button>
        </b-col>
      </b-row>
    </b-container>

    <br> <br>


  </div>



  <div v-show="!genderDiv">
    <span style="font-size: 1.5em;">{{ genderNameTitle }}</span>

    <br><br>


    <b-form-radio-group
      :options="genderoptions"
      class="mb-3"
      value-field="genderitem"
      text-field="name"
    ></b-form-radio-group>

    <br>

    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="genderDiv = !genderDiv, fullnameDiv = !fullnameDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
            <b-button variant="primary" v-on:click="genderDiv = !genderDiv, minorsAddDiv = !minorsAddDiv">NEXT</b-button>
        </b-col>
      </b-row>
    </b-container>

    <br> <br>

  </div>


  <div v-show="!minorsAddDiv">
   
    <br><br>

    <span style="font-size: 1.2em;">{{ minorNameTitle }}</span>

    <div class="work-experiences">

        <div class="form-row" v-for="(experience, index) in minorsDetail" :key="index">
          <div class="form-group col-md-6">
            <label>Minor's full name</label>
            <input v-model="experience.company" :name="`minorsDetail[${index}][company]`" type="text" class="form-control" placeholder="Minor Full Name">
          </div>
          <div class="form-group col-md-6">
            <label>Minor's date of birth</label>
            <input v-model="experience.title" :name="`minorsDetail[${index}][minordob]`" type="date" class="form-control" placeholder="DOB">
          </div>
        </div>
      </div>

      <div class="form-group">
        <button @click="addExperience" type="button" class="btn btn-secondary">Add Minor</button>
      </div>
     
      <hr>

    <!--   <div class="form-group">
        <button @click="submit" type="button" class="btn btn-primary">Submit</button>
      </div> -->




    <br><br>
    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="minorsAddDiv = !minorsAddDiv, genderDiv = !genderDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
            <b-button variant="primary" v-on:click="minorsignDiv = !minorsignDiv, minorsAddDiv = !minorsAddDiv">NEXT</b-button>
        </b-col>
      </b-row>
    </b-container>

    <br> <br>

  </div>


  <div v-show="!minorsignDiv">
     
     <br>

      <span style="font-size: 1.5em;">{{ signDivTitle }}</span>

    <div class="container">
      <div class="row">
        <div class="col-12 mt-2">
          <VueSignaturePad
            id="signature"
            width="100%"
            height="500px"
            ref="signaturePad"
            :options="signatureoptions"
          />
        </div>
      </div>
      <div class="row">
        <div class="col-3 mt-2">
          <button class="btn btn-outline-secondary" @click="undo">Undo</button>
        </div>
        <div class="col-3 mt-2">
          <button class="btn btn-outline-primary" @click="save">Save</button>
        </div>
        <div class="col-3 mt-2">
          <button class="btn btn-outline-primary" @click="change">Change</button>
        </div>
        <div class="col-3 mt-2">
          <button class="btn btn-outline-primary" @click="resume">Resume</button>
        </div>
      </div>
    </div>

    <br><br>

    <input col="6" type="text" disabled="true" v-model="randomNumber"/>

    <br><br>


    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="minorsAddDiv = !minorsAddDiv, minorsignDiv = !minorsignDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
            <b-button variant="primary" v-on:click="minorsignDiv = !minorsignDiv">DONE</b-button>
        </b-col>
      </b-row>
    </b-container>

    <br> <br>

  </div>



  </div>
</template>


<script src="moment.js"></script>
<script>
    moment().format();
</script>

<script>
// import HelloWorld from './components/HelloWorld.vue'
// import BookingName from './components/HelloWorld.vue'
import axios from 'axios';
import VueSignature from "vue-signature-pad";
// import App from "./App";
import Vue from 'vue';
import moment from 'moment';

Vue.use(VueSignature);
Vue.config.productionTip = false;



export default {
  name: 'App',
  components: {
    // HelloWorld,
    // BookingName
  },

  // mounted: function () {
  //   axios.get('https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival=2020-03-12')
  //     .then(response => (this.posts = response.data.data))
  // },

   // mounted: function(){
   // const current = new moment();
   // for(let i=0;i<7;i++){
   //    this.timeList.push(current.format("HH:mm"));
   //    current.add(15, "minutes");
   // };

  mounted: function(){
   const current = new moment().format("HH:MM");
   console.log(current);
   var quaterMinute = ["15","30","30","45"];

        
let next15Minutes = moment().add(15, 'minutes');
          next15Minutes.minutes(Math.floor(next15Minutes.minutes() / 15) * 15);
           this.timeList.push(next15Minutes.format('HH:mm'));
           const timetest = next15Minutes;
           const timetest1 = next15Minutes;


  console.log();
   // var mycurrenttime = current.subtract(1, 'hours');
   for(let i=0;i<6;i++){
    

        if(i<2){
        //  let currenttime2 = currentTime;
          timetest.add(15, 'minutes');
          timetest.minutes(Math.floor(timetest.minutes() / 15) * 15);
          this.timeList.push(timetest.format('HH:mm'));
        //this.timeList.push( moment().format("HH") + ":" + quaterMinute[i] );
         // current.subtract(15, "minutes");
        }
        else{
           timetest1.subtract(15, 'minutes');
          timetest1.minutes(Math.floor(timetest1.minutes() / 15) * 15);
          this.timeList.push(timetest1.format('HH:mm'));
         // next15Minutes.format('HH:mm');
       // this.timeList.push( moment().format("HH") + ":" + quaterMinute[i] );
       //   current.add(15, "minutes");
        }
        // current.subtract(15, "minutes");

      // this.timeList.push(current.format("HH:mm"));
      
   }

   axios.get('https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival=2020-03-12')
      .then(response => (this.posts = response.data.data));

 },


  data() {
      return {
        text: '',
        value: '',
        context: null,
        reservationNameDiv: true,
        reservationTimeDiv: true,
        emailDiv: true,
        fullnameDiv: true,
        genderDiv: true,
        minorDiv: true,
        minorsignDiv: true,
        minorsAddDiv: true,
        greetings: 'Welcome to BEAT THE BOMB',
        reservationTimeTitle: 'Please select your reservation time:',
        reservationNameTitle: 'Please select your reservation name:',
        genderNameTitle: 'Whats your gender ?',
        minorNameTitle: 'Are you responsible for any minors in your group today? Please check the off below to sign a waiver for them.',
        signDivTitle: 'Please sign with your finger',
        randomNumber: "https://btbwaiver/llecnas9841"+Math.floor(Math.random() * 1000000000)+"652602/",
         timeList: [
        ],
        posts: [],
        form:{
          email: '',
          name: '',
          firstname: '',
          lastname:'',
          dateofbirth: ''
         // food: ''
        },
        show: true,
        selected: 'A',
        options: [
          { item: 'A', name: 'YES' },
          { item: 'B', name: 'NO' },
        ],

        genderoptions: [
          {genderitem: 'Male', name: 'Male'},
          {genderitem: 'Female', name: 'Female'},
          {genderitem: 'Non-binary', name: 'Non-binary'},
          {genderitem: 'Others', name: 'Others'}
        ],

        signatureoptions:{
          penColor: "#c0f"
        },

        minorsDetail: [
      {
        minorsName: "",
        title: "Date of Birth"
      }
    ]
      }
    },

    methods:{
      onSubmit(evt) {
        evt.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.form.email = ''
        this.form.name = ''
        //this.form.food = null
        this.form.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      },

      undo() {
      this.$refs.signaturePad.undoSignature();
    },
    save() {
      const { isEmpty, data } = this.$refs.signaturePad.saveSignature();

      alert("Open DevTools see the save data.");
      console.log(isEmpty);
      console.log(data);
    },
    change() {
      this.options = {
        penColor: "#00f"
      };
    },
    resume() {
      this.options = {
        penColor: "#c0f"
      };
    },

    addExperience(){
          this.minorsDetail.push({
            minorsName: '',
            minordob: ''
          })
        },

    submit () {
      const data = {
        minorsDetail: this.minorsDetail
      }
      alert(JSON.stringify(data, null, 2))
    }


    }

//     created() {
//         const axios = require('axios');
// //store it in variable "response" you can name it whatever you want
//           axios.get('https://sandbox1.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7').then(response => (


//               // console.log(response);
//              //access the reponse object
//               this.posts = response.data.bpi;
//               // this.id =
//           ))
//           .catch(error => console.log(error));
//     }

};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  width: 50%; 
  margin-right:auto; 
  margin-left:auto;
  background-color: #f5f7fa;
  height: auto;
}

    .b-form-group .label{
      font-size: 6em;
    }


  #signature {
  border: double 3px transparent;
  border-radius: 5px;
  background-image: linear-gradient(white, white),
    radial-gradient(circle at top left, #4bc5e8, #9f6274);
  background-origin: border-box;
  background-clip: content-box, border-box;
}

.work-experiences > div {
  margin: 20px 0;
  padding-bottom: 10px;
}
.work-experiences > div:not(:last-child) {
  border-bottom: 1px solid rgb(206, 212, 218);
}
</style>