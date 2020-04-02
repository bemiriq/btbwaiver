<template>

  <div id="app">
    <br>
    <div>
      <!-- <img alt="Vue logo" src="./assets/btb.png"> -->
      <a href="/"><img center src="./assets/btb.png" alt="BTB LOGO" style="width:50%;"></img></a>

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

    <br>

    <span style="font-size: 1.7em;">{{ reservationTimeTitle }}</span>
    <!-- <BookingName msg="Please select your booking name"/> -->


<!-- the table code is to work on posting data from this file to MySQL DATABASE -->

<!--      <table border='1' width='80%' style='border-collapse: collapse;'>
   <tr>
     <th>URL</th>
   </tr>

   <!-- Add -->
   <!-- <tr>
     <input type="file" id="file" ref="file" />

   <button type="button" @click='addRecord()' >Upload file</button>
   <!-- </tr>

  </table>
 -->

    <br> <br>

    <!--
    <div v-for="(year,index) in timeList" v-model="selectedTime">

      <b-button block pill variant="outline-info" id="fetchButtonGap" v-model:value="index,year" v-on:click="showTheTime();">
        {{year}}<br>
      </b-button>
      <!-- <p><a href="#" @click.prevent="removeDuplicates">Remove duplicates</a></p>

    </div>

    <button v-on:click="reservationTimeDiv = !reservationTimeDiv ; reservationNameDiv = !reservationNameDiv ;">
      NEXT
    </button>

      <select v-model="selectedTime">
    <option v-for="(year,index) in timeList"
            v-model:value="index">{{year}}</option>
    
  </select>
 <button v-on:click="showTheTime(); reservationTimeDiv = !reservationTimeDiv ; reservationNameDiv = !reservationNameDiv ;">
    click here
  </button> -->

  <div>
    <b-form-select variant="info" v-model="selectedTime" :select-size="4" class="reservationTimeOption">
      <option v-for="(year,index) in timeList" v-model:value="index">{{year}}</option>
    </b-form-select>
    <div class="mt-3 selectedBookingTime"> <strong> {{ selectedTime }}</strong> </div>
  </div>



    <br><br>

    <b-container class="bv-example-row">
      <b-row>

        <b-col>
           <b-button variant="primary" v-on:click="showAllTime(); reservationNameDiv = !reservationNameDiv, reservationTimeDiv = !reservationTimeDiv">DONT KNOW</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
          <b-button variant="outline-primary" v-on:click="showTheTime(); reservationTimeDiv = !reservationTimeDiv ; reservationNameDiv = !reservationNameDiv ;">NEXT</b-button>
        </b-col>

      </b-row>

    </b-container>


    <div>
      <!-- <b-button v-b-modal.modal-center>DONT KNOW</b-button> -->

      <!-- <b-modal id="modal-center" centered title="Booking Time Required">
        <p class="my-4">Please look up for front desk staff to get your booking time. This process is required to forward your photos/videos from Beat The Bomb.</p>
      </b-modal> -->

      
    </div>

    <br> <br>

  </div>


  <!-- <b-button variant="outline-primary" v-on:click="reservationNameDiv = !reservationNameDiv">Button</b-button> -->

  <div v-show="!reservationNameDiv">

    <br><br>

    <span style="font-size: 1.7em;">{{ reservationNameTitle }}</span>
      <!-- <ul>
        <li v-for="post in posts" :key="post.customerName">{{post.customerName}}</li>
      </ul> -->

    <br><br>

      <div v-for="post in posts" :key="post.customerName">
        <b-button block pill variant="outline-info" id="fetchButtonGap" v-on:click="reservationNameDiv = !reservationNameDiv, emailDiv = !emailDiv">
          {{post.customerName}}
        </b-button>
      </div>

    <br><br>

    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="reservationNameDiv = !reservationNameDiv, reservationTimeDiv = !reservationTimeDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>


        <b-col>
          <div id="bookingNameModal">
            <b-button v-b-modal="'modalName'">DONT KNOW</b-button>

            <b-modal id="modalName" centered title="Booking Name Required">
              <p class="my-4">Please call front desk staff fosr the help ! We forward your Beat The Bomb photos/videos using your booking email, so booking name is required.</p>
            </b-modal>
          </div>

        </b-col>


      </b-row>

    </b-container>


    <br> <br>
   
  </div>


  <div v-show="!emailDiv">
    <!-- <p>SAN 2</p> -->
    <br><br>

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
          id="inputField"
          v-model="email"
          type="email"
          required
          placeholder="Enter email"
        ></b-form-input>

    <br><br>

    <span style="font-size: 1.2em;">
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
            <b-button variant="primary" v-on:click="emailDiv = !emailDiv, fullnameDiv = !fullnameDiv" v-bind:disabled="isDisableComputed">NEXT</b-button>
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
        label="First Name"
        label-for="input-1" class="nameTitle">
      </b-form-group>

      <b-form-group
        <b-form-input
          id="inputField"
          v-model="firstname"
          type="text"
          required
          placeholder="Enter your first name"
        ></b-form-input>
      </b-form-group>

      <br/>

      <b-form-group
        id="input-group-1"
        label="Last Name"
        label-for="input-1" class="nameTitle">
      </b-form-group>

      <b-form-group>

        <b-form-input
          id="inputField"
          v-model="lastname"
          type="text"
          required
          placeholder="Enter your last name"
        ></b-form-input>

      <br/>

      </b-form-group>

        <b-form-group
        id="input-group-1"
        label="Date of Birth"
        label-for="input-1" class="nameTitle">
      </b-form-group>

      <b-form-group>
        <date-dropdown 
          default="1993.01.10" 
          min="1940" 
          max="2020"
          :months-names="months" 
          v-model="selectedDate" id="dateDropdownDesign">
        </date-dropdown>
      </b-form-group>
    
    </b-form>

    <br><br>

    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="fullnameDiv = !fullnameDiv, emailDiv = !emailDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
            <b-button variant="primary" v-on:click="fullnameDiv = !fullnameDiv, genderDiv = !genderDiv" v-bind:disabled="isDisableFixedFirstName">NEXT</b-button>
        </b-col>
      </b-row>
    </b-container>

    <br> <br>


  </div>



  <div v-show="!genderDiv">

    <br><br>

    <span style="font-size: 1.5em;">{{ genderNameTitle }}</span>

    <br><br>


    <b-form-radio-group
      :options="genderoptions"
      class="mb-3"
      type="text"
      v-model="gender"
      value-field="genderitem"
      text-field="name"
    ></b-form-radio-group>


    <br><br>


    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="genderDiv = !genderDiv, fullnameDiv = !fullnameDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
            <b-button variant="primary" v-on:click="genderDiv = !genderDiv, minorsAddDiv = !minorsAddDiv" v-bind:disabled="validateGenderField">NEXT</b-button>
        </b-col>
      </b-row>
    </b-container>

    <br> <br>

  </div>


  <div v-show="!minorsAddDiv">
   
    <br><br>

    <span style="font-size: 1.1em;">{{ minorNameTitle }}</span>

    <br><br>

    <div class="work-experiences">

        <div class="form-row" v-for="(experience, index) in minorsDetail" :key="index">
          <div class="form-group" id="minorsInput">
            <label id="minorHeading">Minor's full name</label>
            <input v-model="experience.company" :name="`minorsDetail[${index}][company]`" type="text" class="form-control" placeholder="Minor Full Name">
          </div>
          <div class="form-group" id="minorsInput">
            <label id="minorHeading">Minor's date of birth</label>
            <!-- <input v-model="experience.title" :name="`minorsDetail[${index}][minordob]`" type="date" class="form-control" placeholder="DOB"> -->
            <date-dropdown default="1993.01.10" min="1940" max="2020" :months-names="months" v-model="selectedDate" id="dateDropdownDesign">
        </date-dropdown>
          </div>
        </div>
      </div>

    <br>

      <div class="form-group">
        <button @click="addExperience" type="button" class="btn btn-info">Add Minor</button>
        <button @click="removeExperience" type="button" class="btn btn-outline-info">Remove Minor</button>
      </div>
     

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
     
     <br><br>
    <div style="text-align: left; margin-left: 2%; margin-right: 2%; text-align:justify;">
      <span style="font-size: 1.0em;">{{ waiverParagraph1 }}</span><br/><br/>
      <span style="font-size: 1.0em; ">{{ waiverParagraph2 }}</span><br/><br/>
      <span style="font-size: 1.0em;">{{ waiverParagraph3 }}</span><br/><br/>
      <span style="font-size: 1.0em;">{{ waiverParagraph4 }}</span><br/><br/>
      <span style="font-size: 1.0em;">{{ waiverParagraph5 }}</span><br/><br/>
      <span style="font-size: 1.0em;">{{ waiverParagraph6 }}</span><br/><br/>
      <span style="font-size: 1.0em;">{{ waiverParagraph7 }}</span><br/><br/>
      <span style="font-size: 1.0em;">{{ waiverParagraph8 }}</span><br/><br/>
      <span style="font-size: 1.0em;">{{ waiverParagraph9 }}</span><br/><br/>
      <span style="font-size: 1.0em;"><b>{{ waiverParagraph10 }}</b></span><br/><br/>
    </div>
    <br>
      <span style="font-size: 1.3em;">{{ signDivTitle }}</span>
      <br>

      
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
        
          <button class="btn btn-outline-primary" @click="change">Reset</button>
        </div>
        <!-- <div class="col-3 mt-2">
          <button class="btn btn-outline-primary" @click="resume">Resume</button>
        </div> -->
      </div>
    </div>

    <br><br>

    <input col="6" type="hidden" disabled="true" v-model="randomNumber"/>

    <br>

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

<script src="../dist/vue-date-dropdown.min.js"></script>
<!-- <script src="https://unpkg.com/axios/dist/axios.min.js"></script> -->
<script src="vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
// import HelloWorld from './components/HelloWorld.vue'
// import BookingName from './components/HelloWorld.vue'
import axios from 'axios';
import VueSignature from "vue-signature-pad";
// import App from "./App";
import Vue from 'vue';
import moment from 'moment';
import DateDropdown from 'vue-date-dropdown'; // this for the date dropdown


Vue.use(VueSignature);
Vue.config.productionTip = false;

Vue.use(DateDropdown);



export default {
  name: 'App',
  components: {
    // HelloWorld,
    // BookingName
    DateDropdown
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

   computed: {
    isDisableComputed() {
      return this.email.length < 5;      
    },

    isDisableFixedFirstName(){
      return this.lastname.length && this.firstname.length < 3;
    },

    validateGenderField(){
      return this.gender.length < 1;
    }

  },

  mounted: function(){
   const current = new moment().format("hh:mm");
   console.log(current);
   var quaterMinute = ["15","30","30","45"];

        
let next15Minutes = moment().add(15, 'minutes');
          next15Minutes.minutes(Math.floor(next15Minutes.minutes() / 15) * 15);
           this.timeList.push(next15Minutes.format('hh:mm A'));
           const timetest = next15Minutes;
           const timetest1 = next15Minutes;


  console.log();
   // var mycurrenttime = current.subtract(1, 'hours');
   for(let i=0;i<5;i++){
    

        if(i<1){
        //  let currenttime2 = currentTime;
          timetest.add(15, 'minutes');
          timetest.minutes(Math.floor(timetest.minutes() / 15) * 15);
          this.timeList.push(timetest.format('hh:mm A'));
        //this.timeList.push( moment().format("HH") + ":" + quaterMinute[i] );
         // current.subtract(15, "minutes");
        }
        else{
           timetest1.subtract(15, 'minutes');
          timetest1.minutes(Math.floor(timetest1.minutes() / 15) * 15);
          this.timeList.push(timetest1.format('hh:mm A'));
         // next15Minutes.format('HH:mm');
       // this.timeList.push( moment().format("HH") + ":" + quaterMinute[i] );
       //   current.add(15, "minutes");
        }
        // current.subtract(15, "minutes");

      // this.timeList.push(current.format("HH:mm"));
      
   }

   this.timeList = [ ...new Set(this.timeList) ];

    // var arrivalDate = moment();
    // console.log(arrivalDate);
    console.log(this.selectedTime);
     // console.log(this.arrivalTime1);
    var arrivalDate = moment().format('YYYY-MM-DD');
    var arrivalTime = this.arrivalTime1;
    // console.log(arrivalTime1);

    // var arrivalTime = '1530';
    // var arrivalTime1 = '1715';

   // axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate&"arrivalTime="+arrivalTime)
   //the link below is for arrival time from one time to other
   //axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+"&items.arrivalTime="+arrivalTime)+","+arrivalTime1
    axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+"&items.arrivalTime="+arrivalTime)
      .then(response => (this.posts = response.data.data));

 },


  data() {
      return {
        text: '',
        value: '',
        context: null,
        arrivalTime1: '',
        selectedTime: '',
        reservationNameDiv: true,
        reservationTimeDiv: true,
        emailDiv: true,
        fullnameDiv: true,
        genderDiv: true,
        minorDiv: true,
        minorsignDiv: true,
        minorsAddDiv: true,

        email: '',
        firstname: '',
        lastname: '',
        gender: '',

        greetings: 'Welcome to BEAT THE BOMB',
        reservationTimeTitle: 'Please select your reservation time:',
        reservationNameTitle: 'Please select your reservation name:',
        genderNameTitle: 'Whats your gender ?',
        minorNameTitle: 'Are you responsible for any minors in your group today? Please check the off below to sign a waiver for them.',
        signDivTitle: 'Please sign with your finger',
        modalTimeDialog: false,
        modalNameDialog: false,
        randomNumber: "https://btbwaiver/llecnas9841"+Math.floor(Math.random() * 1000000000)+"652602/",
        selectedDate: '',
        months: 'Jan, Feb, Mar, Apr, May, Jun, July, Aug, Sep, Oct, Nov, Dec',
         timeList: [],
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
          {genderitem: 'Other', name: 'Other'}
        ],

        signatureoptions:{
          penColor: "#c0f"
        },

        minorsDetail: [
      {
        minorsName: "",
        title: "Date of Birth"
      }
    ],

    file: "",

      // below is the paragraph that represents waiver
      waiverParagraph1: ' Task Force Zero LLC is the owner and operator of Beat The Bomb.',
      
      waiverParagraph2: 'In consideration of Task Force Zero LLC allowing me to participate in Beat The Bomb, Iunderstand and acknowledge that risks and dangers exist due to participation in BeatThe Bomb. ',

      waiverParagraph3: 'I understand and acknowledge that my participation in Beat The Bomb (and/or my useof any equipment provided) may result in harm to me (including but not limited to): bodilyinjury, fractures, eye injury, blindness, heat stroke, heart attack, disease strains, partialand/or total paralysis, death or other ailments that could cause serious disability.',

      waiverParagraph4: 'I understand and acknowledge that such injuries could result from (including but notlimited to): traversing back and forth across a laser maze that uses Class IIIa 5mWlasers with a 650nm red wavelength; slips, trips, and/or falls in the facility, including butnot limited to slippery floors and/or walls (from water, paint, or other substances), thathave no hand rails; contact with and/or crashing into other participants (whether due totheir or your purposeful, reckless, or negligent behavior); contact with and/or crasheswith the walls, floors, large metal columns, or doors of any room; defective or negligentlymaintained or operated equipment in our facility, and/or equipment that is being used ina manner in which it was never intended to be used; getting blasted by high pressure aircanons connected to pipes filled with paint and foam and/or soft rubber balls.',

      waiverParagraph5:' I understand that the above risks and dangers (and resultant harm to me) maybe caused by the negligence of the owners, employees, officers or agents of Task ForceZero LLC; the negligence of other participants or onlookers in the experience, by myown negligence, by accidents, or by forces of nature or other causes. These risks anddangers may arise from foreseeable or unforeseeable causes. By my participation inthese activities and/or use of equipment, I hereby assume all risks and dangers and allresponsibility for any losses and/or damages, whether caused in whole or in part by thenegligence or other conduct of the owners, agents, officers, employees of Task ForceZero LLC, or by any other person.',

      waiverParagraph6:' I, on behalf of myself, my personal representatives and my heirs, executors,administrators, and assigns, hereby voluntarily agree to release, waive, discharge, holdharmless, defend and indemnify Task Force Zero LLC and its owners, employees,agents, officers, members, promoters, contractors or business partners, from any andevery claims, demands, actions or rights of action, of whatsoever kind or nature, either inlaw or in equity arising from or by reason of any bodily injury, or personal injuries knownor unknown, property damage, wrongful death, loss of services, or otherwise, resultingor to arise out of my participation in Beat The Bomb, whether by negligence or non-negligence or from any and all other incidents of harm and /or ill-will.',

      waiverParagraph7: 'I specifically understand that I am releasing, discharging and waiving any claims oractions that I may have presently or in the future for the negligent acts or conduct by theowners, employees, agents, officers, members, promoters, contractors or businesspartners of Task Force Zero LLC. This waiver also applies to me even if I am not aparticipant but am instead attending Beat The Bomb as a spectator or bystander. ',

      waiverParagraph8: 'Furthermore I hereby give Task Force Zero LLC or any of its assigns or businesspartners the absolute and irrevocable right and permission with respect to any and all photographs/videos taken of myself, a) to copyright the same in Task Force Zero LLC’sor Beat The Bomb’s name or any other name that Task Force Zero LLC may select; b) touse, re-use, publish and republish the same in whole or in part, separately or inconjunction with other photographs, in any medium now or hereafter known, includingon the Internet and any and all social media channels, and for any purpose whatsoever,including (but not by way of limitation) advertising, promotion and trade; I hereby releaseand discharge Task Force Zero LLC from all and any claims and demands ensuing fromor in connection with the use of the photographs/videos, including any and all claims forlibel and invasion of privacy. This authorization and release shall inure to the benefit ofthe legal representatives, licensees, and assigns of Task Force Zero LLC.',

      waiverParagraph9: 'Finally, for two years after the expiration of this agreement, I waive any and all rightsto build, design, develop, or fund, aid, influence, or direct, anyone else to build, design,or develop, without the express written permission and agreement of Task Force ZeroLLC, any product or experience, for either commercial or even non-commercialpurposes, that is substantially similar in technical design, game mechanics, orexperiential elements to Beat The Bomb or aspects of it. This waiver intends to captureall of the constituent Beat The Bomb games, currently Hack Attack, Laser Maze, EchoChamber, Floor Grid, or CyberBot, and also Beat The Bombs signature paint explosionending (which concept covers all projectile paint, paint blast, paint canon, or paint bombexperiences). This waiver is meant to provide additional legal protection to Task ForceZero LLC over and above any other protections provided by applicable copyright andtrademark laws, out of respect for the investment and effort that it took Task Force ZeroLLC develop the Beat The Bomb product and experience, and despite the fact that BeatThe Bomb is marketed to and open to the general public.',

      waiverParagraph10: 'I HAVE READ THE ABOVE WAIVER AND RELEASE AND BY SIGNING IT AGREE ITIS MY INTENTION TO EXEMPT AND RELIEVE TASK FORCE ZERO LLC FROMLIABILITY FOR PERSONAL INJURY, PROPERTY DAMAGE AND/OR WRONGFULDEATH CAUSED BY NEGLIGENCE AND/OR ANY OTHER CAUSE.'
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

    removeExperience: function(todo){
      // this.minorsDetail.splice({
      //   minorsName: '',
      //   minordob: ''

        var index = this.minorsDetail.indexOf(todo)
        this.minorsDetail.splice(index, 1)
    },

    submit () {
      const data = {
        minorsDetail: this.minorsDetail
      }
      alert(JSON.stringify(data, null, 2))
    },

    removeDuplicates () {
      this.timeList = [ ...new Set(this.timeList) ]
    },

    addRecord: function(){

       this.file = this.$refs.file.files[0];

       let formData = new FormData();
       formData.append('file', this.file);

       axios.post('ajaxfile.php', formData,
       {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
       })
       .then(function (response) {

          if(!response.data){
             alert('File not uploaded.');
          }else{
             alert('File uploaded successfully.');
          }

       })
       .catch(function (error) {
           console.log(error);
       });

     },

     showTheTime: function (event){
      // alert(this.selectedTime);
      // console.log(event.target.value);
      // var standardTimeFormat = event.target.value;

      var standardTimeFormat = this.selectedTime;

      console.log(this.selectedTime);
      console.log(standardTimeFormat);

      var militaryTimeFormat = moment(standardTimeFormat, "h:mm A").format("HHmm");
      // var militaryTimeFormat = moment(this.selectedTime).format("HHMM");
      console.log(militaryTimeFormat);

    var arrivalDate = moment().format('YYYY-MM-DD');
    // var arrivalTime = this.militaryTimeFormat;
    axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+"&items.arrivalTime="+militaryTimeFormat)
      .then(response => (this.posts = response.data.data));


       // var x = document.getElementById("reservationTimeDiv");
       // var y = document.getElementById("reservationNameDiv");
       // console.log(x);
       //  if (x.style.display = "block") {
       //    y.style.display = "block";
       //    // x.style.display = "block";
       //  } 
       //  if(y.style.display === "block") {
       //    x.style.display = "none";
       //    y.style.display = "block";
       //  }



     },


     showAllTime: function (event){

    var arrivalDate = moment().format('YYYY-MM-DD');

    axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate)
      .then(response => (this.posts = response.data.data));

     },


     isDisableFixed(email) {
      return email.length > 5;
      },

      isDisableFixedFirstName(firstname) {
      return text.length > 2;
      },

      disableLastName(lastname){
        return text.length > 2;
      },

      validateGenderField(gender){
        return text.length > 0;
      }

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

;
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

  #inputField{
    width: 60%;
    margin: auto;
  }

  #minorsInput{
    width: 40%;
    margin: auto;
  }

  #minorHeading{
    font-size: 1.2em;
  }

  #fetchButtonGap{
    width: 41%;
    margin:auto;
    margin-top: 10px;
    font-size: 1.1em;
  }

  #dateDropdownDesign{
    margin-left: 20%;
    width: 30%;
  }

  .nameTitle{
    font-size: 1.1em;
    text-align: left;
    margin-left: 21%;
  }

  .reservationTimeOption{
    width: 50%;
    font-size: 1.3em;
  }

  .selectedBookingTime{
    font-size: 1.5em;
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