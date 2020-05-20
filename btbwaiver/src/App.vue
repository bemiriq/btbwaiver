  <template>

    <div id="app">
      <br/>

      <br>

      <div>
        <!-- <img alt="Vue logo" src="./assets/btb.png"> -->
        <a href="/"><img center src="./assets/btb.png" alt="BTB LOGO" style="width:auto;"></img></a>

      </div>

      <br><br>

  <br/>
      <div>
        <span style="font-size: 2.2em;">{{ greetings }}</span>
      </div>

      <hr>


      <div v-show="reservationTimeDiv">

        <br>

        <span style="font-size: 1.7em;">{{ reservationTimeTitle }}</span>

        <br> <br>


        <div v-for="(year,index) in timeList" v-model="selectedTime">

          <b-button block pill variant="outline-info" id="fetchButtonGap" v-model:value="index,year" v-on:click="showTheTime(); reservationTimeDiv = !reservationTimeDiv ; reservationNameDiv = !reservationNameDiv ;">
            {{year}}<br>
          </b-button>

        </div>


        <br><br>

        <b-container class="bv-example-row">
          <b-row>

            <b-col>

            </b-col>

            <b-col>

              <!-- <b-button variant="primary" v-on:click="showAllTime(); allreservationamediv = !allreservationamediv, reservationTimeDiv = !reservationTimeDiv; getallreservation();">Need Help?</b-button> -->
              <b-button variant="primary" v-on:click="allreservationamediv = !allreservationamediv, reservationTimeDiv = !reservationTimeDiv;">Need Help?</b-button>



            </b-col>

            <b-col>

            </b-col>

          </b-row>

        </b-container>


        <div>


        </div>

        <br> <br>

      </div>

      <!-- this div list all the name of reservation -->
      <div v-show="!allreservationamediv">
        <br><br>

        <span style="font-size: 1.7em;">{{ reservationNameTitle }}</span>

        <br><br>

        <div>
          <div v-for="(post, index) in allbookings" :key="post.customerName">
            <b-button block pill variant="outline-info" id="fetchButtonGap" v-on:click="bookerName(index); allreservationamediv = !allreservationamediv, fullnameDiv = !fullnameDiv">
              {{post.customerName}}
            </b-button>
          </div>

          <div v-if="!allbookings.length"><br><span style="font-size:1.1em; color: #17a2b8;">{{ noBookingTitle }}</span><br/></div>

        </div>

        <br><br>
         <b-container class="bv-example-row">
          <b-row>
            <b-col>
              <b-button variant="outline-info" v-on:click="allreservationamediv = !allreservationamediv, reservationTimeDiv = !reservationTimeDiv">BACK</b-button>
            </b-col>

            <b-col></b-col>


            <b-col>
              <div id="bookingNameModal">
                <b-button v-b-modal="'modalNameList1'">Need Help?</b-button>

                <b-modal id="modalNameList1" centered title="Booking Name Required">
                  <p class="my-4">Please ask the front desk staff for assistance.</p>
                </b-modal>
              </div>

            </b-col>


          </b-row>

        </b-container>

      </div>
      <!-- end of list all name of reservation  -->


      <div v-show="!reservationNameDiv">

        <!-- <div v-for="LoadingScreen"/> -->

        <br><br>

        <span style="font-size: 1.7em;">{{ reservationNameTitle }}</span>

        <br><br>
        <div id="hideDiv" style="visibility:hidden;">
          <div v-for="(post, index) in posts" :key="post.customerName">
            <b-button block pill variant="outline-info" id="fetchButtonGap" v-on:click="bookerName(index); reservationNameDiv = !reservationNameDiv, fullnameDiv = !fullnameDiv">
              {{post.customerName}}
            </b-button>
          </div>

          <div v-if="!posts.length"><br><span style="font-size:1.1em; color: #17a2b8;">{{ noBookingTitle }}</span><br/></div>
        </div>
        <br><br>

        <b-container class="bv-example-row">
          <b-row>
            <b-col>
              <b-button variant="outline-info" v-on:click="reservationNameDiv = !reservationNameDiv, reservationTimeDiv = !reservationTimeDiv">BACK</b-button>
            </b-col>

            <b-col></b-col>


            <b-col>
              <div id="bookingNameModal">
                <b-button v-b-modal="'modalName'">Need Help?</b-button>

                <b-modal id="modalName" centered title="Booking Name Required">
                  <p class="my-4">Please ask the front desk staff for assistance.</p>
                </b-modal>
              </div>

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
      label-for="input-1" class="nameTitle" >
    </b-form-group>

    <b-form-group
    <b-form-input
    id="inputField"
    v-model="first_name"
    type="text"
    required
    placeholder="Enter your first name" size="lg"
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
    v-model="last_name"
    type="text"
    required
    placeholder="Enter your last name" size="lg"
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
    default="1993.02.27" 
    min="1940" 
    max="2020"
    :months-names="months" :format="'YYYY.MM.DD'"
    v-model="date_of_birth" id="dateDropdownDesign" size="lg">
  </date-dropdown>
  </b-form-group>

  </b-form>

  <br><br>

  <b-container class="bv-example-row">
    <b-row>
      <b-col>
        <b-button variant="outline-primary" v-on:click="fullnameDiv = !fullnameDiv, reservationNameDiv = !reservationNameDiv">BACK</b-button>
      </b-col>

      <b-col></b-col>

      <b-col>
        <b-button variant="primary" v-on:click="fullnameDiv = !fullnameDiv; emailDiv = !emailDiv;" v-bind:disabled="isDisableFixedFirstName" >NEXT</b-button>
      </b-col>
    </b-row>
  </b-container>

  <br> <br>


  </div>


        <div v-show="!emailDiv">
        <!-- <p>SAN 2</p> -->
        <br><br>

            <br>
            <!-- <b-form @submit="onSubmit" @reset="onReset" v-if="show"> -->

              <b-form-group
      id="input-group-1" class="nameTitle"> Enter Email Address <span style="color:red;">*</span>
    </b-form-group>

            <b-form-group>
              <b-form-input
              id="inputField"
              v-model="email"
              type="email"
              required
              placeholder="Enter Email Address" size="lg">
            </b-form-input>
          </b-form-group>

          <b-form-group
              id="input-group-1"
              label-for="input-1"
              description="We will use this address to share your FREE photos & videos. Please ensure the information is accurate."
              >
            </b-form-group>

          <br><br>
            <b-form-group
      id="input-group-1" class="nameTitle"> Phone Number <span style="color:red;">*</span>
    </b-form-group> 

              <b-form-group>
                <b-form-input
                id="inputField"
                v-model="phone"
                type="tel"
                required
                placeholder="Enter Cell Phone Number" size="lg">
              </b-form-input>
            </b-form-group>

            <b-form-group
              id="input-group-1"
              label-for="input-1"
              description="We will use this phone number to share your FREE photos & videos. Please ensure the information is accurate."
              >
            </b-form-group>

          <br><br>

          <b-form-group
      id="input-group-1"
      label="Instagram Username"
      label-for="input-1" class="nameTitle">
    </b-form-group>

      <b-form-group class="instagramField">
        <b-input-group prepend="@" size="lg">
          <b-form-input
            id="inline-form-input-name"
            v-model="instagram"
            type="text"
            required
            placeholder="Enter Instagram Handle">
          </b-form-input>
        </b-input-group>
      </b-form-group>
      <b-form-group id="input-group-1" label-for="input-1" description="Share your handle for a chance to be featured on our official Instagram channel.">
      </b-form-group>

  <!-- <span style="font-size: 0.8em;">If you don't have one, please enter @bombsquad</span> -->

  <br><br>

<b-form-group
      id="input-group-1"
      label="Interested in getting promotional emails from Beat The Bomb?"
      label-for="input-1" class="nameTitle">
    </b-form-group>

  <b-form-radio-group v-model="promotional_item" class="mb-3" value-field="promotionalitem" text-field="name">
    <b-form-radio value="1">YES</b-form-radio>
    <b-form-radio value="0">NO</b-form-radio>
  </b-form-radio-group>

  </b-form>

  <br>

  <b-container class="bv-example-row">
    <b-row>
      <b-col>
        <b-button variant="outline-primary" v-on:click="fullnameDiv = !fullnameDiv, emailDiv = !emailDiv">BACK</b-button>
      </b-col>

      <b-col></b-col>

      <b-col>
        <b-button variant="primary" v-on:click="emailDiv = !emailDiv; genderDiv = !genderDiv;" v-bind:disabled="isDisableComputed">NEXT</b-button>
      </b-col>
    </b-row>
  </b-container>

  <br> <br>

  </div>



  <div v-show="!genderDiv">

    <br><br>

    <span style="font-size: 1.6em;">{{ genderNameTitle }}</span>

    <br><br>


    <b-form-radio-group
    :options="genderoptions"
    type="text"
    v-model="gender_id"
    value-field="genderitem"
    text-field="name" id="genderText"
    ></b-form-radio-group>


    <br><br>


    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="genderDiv = !genderDiv, emailDiv = !emailDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
          <b-button variant="primary" v-on:click="genderDiv = !genderDiv; hearAboutUsDiv = !hearAboutUsDiv;checkMissionId();" v-bind:disabled="validateGenderField">NEXT</b-button>
        </b-col>
      </b-row>
    </b-container>

    <br> <br>

  </div>


  <div v-show="!hearAboutUsDiv" id="hearAboutUsDiv">

    <br><br>
    <span style="font-size: 1.6em;">{{ hearAboutUsTitle }}</span>
    <br><br>

      <div class="form-check">
        <b-form-radio class="form-check-input" id="radio-group-6" type="radio" value="Heard about it directly from a friend, family or colleague" v-model="hearAboutUs">
          Heard about it directly from a friend, family or colleague
        </b-form-radio>
      </div>
      <div class="form-check">
        <b-form-radio class="form-check-input" id="radio-group-1" type="radio" value="Saw it on a friend's social media" v-model="hearAboutUs">
          Saw it on a friend's social media 
        </b-form-radio>
      </div>
      <div class="form-check">
        <b-form-radio class="form-check-input" id="radio-group-2" type="radio" value="Advertisement on Facebook or Instagram" v-model="hearAboutUs">
          Advertisement on Facebook or Instagram
        </b-form-radio>
      </div>
      <div class="form-check">
        <b-form-radio class="form-check-input" id="radio-group-3" type="radio" value="Google search" v-model="hearAboutUs">
          Google search
        </b-form-radio>
      </div>
      <div class="form-check">
        <b-form-radio class="form-check-input" id="radio-group-4" type="radio" value="Trip Advisor, Yelp or other Review site " v-model="hearAboutUs">
          Trip Advisor, Yelp or other Review site 
        </b-form-radio>
      </div>
      <div class="form-check">
        <b-form-radio class="form-check-input" id="radio-group-5" type="radio" value="Other" v-model="hearAboutUs">
         Other
        </b-form-radio>
      </div>

      <br><br>
    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="hearAboutUsDiv = !hearAboutUsDiv, genderDiv = !genderDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
          <b-button variant="primary" v-on:click="hearAboutUsDiv = !hearAboutUsDiv, minorsAddDiv = !minorsAddDiv" v-bind:disabled="valiadateHearAboutUs">NEXT</b-button>
        </b-col>
      </b-row>
    </b-container>

    <br><br>

  </div>


  <div v-show="!minorsAddDiv">

        <br><br>

    <span style="font-size: 1.3em;">{{ minorNameTitle }}</span>

    <br><br>

      <b-form-radio-group v-model="minorsChecked" :options="optionsSelectedNo" class="mb-3" value-field="item" text-field="name">
        
      </b-form-radio-group>

    <div v-show="minorsChecked  === 'A' ">

      <div class="work-experiences">

      <div class="form-row" v-for="(minordatabase, index) in minorsDetail" :key="index">

        <div class="col" style="margin-left: 8%;">
          <label id="minorHeading">Minor's full name</label>
          <input v-model="minordatabase.first_name" type="text" class="form-control" placeholder="Minor Full Name" size="lg"/>
        </div>

        <div class="col">
            <label id="minorHeading">Minor's date of birth</label>
            <!-- <input v-model="experience.title" :name="`minorsDetail[${index}][minordob]`" type="date" class="form-control" placeholder="DOB"> -->
            <date-dropdown default="1993.01.10" min="1940" max="2020" :months-names="months" v-model="minordatabase.date_of_birth" style="margin-left: 22%;" size="lg">
            </date-dropdown>

        </div>

      </div>

      

        
      </div>

      <br>

      <div class="form-group">
        <button @click="addExperience" type="button" class="btn btn-info" style="margin-right:1.5%;">Add Another Minor</button>
        <button @click="removeExperience" type="button" class="btn btn-outline-info">Remove Minor</button>
      </div>

    </div>

    <div v-show="minorsChecked  === 'B' ">

    </div>

    <br><br>

    <b-container class="bv-example-row">
      <b-row>
        <b-col>
          <b-button variant="outline-primary" v-on:click="minorsAddDiv = !minorsAddDiv, hearAboutUsDiv = !hearAboutUsDiv">BACK</b-button>
        </b-col>

        <b-col></b-col>

        <b-col>
          <!-- <b-button variant="primary" v-on:click="checkPlayerId();">SUBMIT</b-button> -->
          
        <b-button variant="primary" v-on:click="postReservationData(); postPeopleData(); minorsignDiv = !minorsignDiv; minorsAddDiv = !minorsAddDiv;">NEXT</b-button>
        <!-- <b-button variant="primary" v-on:click="submitMinorForm();">SUBMIT</b-button> -->

          <!-- {{lastPlayerData.id}} -->
        </b-col>
      </b-row>
    </b-container>
    
    <br/>

  </div>


  <div v-show="!minorsignDiv">

   <br><br>

      <div style="text-align: left; margin-left: 2%; margin-right: 2%; text-align:justify;">
    <span style="font-size: 1.0em;">{{ waiverParagraph1 }}</span><br/><br/>
    <span style="font-size: 1.0em; ">{{ waiverParagraph2 }}</span><br/><br/>
    <span style="font-size: 1.0em;">{{ waiverParagraph3 }}</span><br/><br/>
  </div>

   <div>
    <b-button v-b-modal.modal-scrollable variant="info">View Full Waiver</b-button>

      <b-modal id="modal-scrollable" scrollable title="Waiver Legal">
        <p class="my-4">
          {{ waiverParagraph1 }}
        </p>

        <p class="my-4">
          {{ waiverParagraph2 }}
        </p>

        <p class="my-4">
          {{ waiverParagraph3 }}
        </p>

        <p class="my-4">
          {{ waiverParagraph4 }}
        </p>

        <p class="my-4">
          {{ waiverParagraph5 }}
        </p>
        <p class="my-4">
          {{ waiverParagraph6 }}
        </p>
        <p class="my-4">
          {{ waiverParagraph7 }}
        </p>
        <p class="my-4">
          {{ waiverParagraph8 }}
        </p>
        <p class="my-4">
          {{ waiverParagraph9 }}
        </p>
        <p class="my-4">
          {{ waiverParagraph10 }}
        </p>

      </b-modal>
    </div>

  <br>
  <span style="font-size: 1.3em;">{{ signDivTitle }}</span>
  <br>


  <div class="container">
    <div class="row">
      <div class="col-12 mt-2">
        <VueSignaturePad
        id="signature"
        width="auto"
        height="400px"
        ref="signaturePad"
        :options="signatureoptions" v-show="showSignaturePad" style="margin:auto;"
        />
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-3 mt-2">
        <button class="btn btn-outline-secondary" @click="undo">Undo</button>

         <button class="btn btn-outline-primary" @click="change">Reset</button> 
      </div>
    </div> -->
  </div>

  <br><br>

  <input col="6" type="hidden" disabled="true" v-model="randomNumber"/>

  <br>

  <!-- modal defined to pass value on mutiple database -->
  <b-modal id="modal-1" ref="my-modal-submit-id" title="BTB Waiver Form" centered v-bind:hide-footer="true">
    <p> Please click on submit to complete this waiver. If you want to go through your waiver again, please click on cross sign on top right. </p>
      <b-button variant="primary" v-on:click="submitPlayerForm(); submitMinorForm(); reloadfunction(); minorsignDiv = !minorsignDiv ; waiverSubmitted = !waiverSubmitted; hideModal(); clickedTimer();">SUBMIT</b-button>
      <!-- <b-button variant="primary" v-on:click="submitPlayerForm(); submitMinorForm(); checkReservationId(); minorsignDiv = !minorsignDiv ; waiverSubmitted = !waiverSubmitted; hideModal(); clickedTimer();">SUBMIT</b-button> -->
  </b-modal>

  <b-container class="bv-example-row">
    <b-row>
      <b-col>
        <b-button variant="outline-primary" v-on:click="minorsAddDiv = !minorsAddDiv, minorsignDiv = !minorsignDiv">BACK</b-button>
      </b-col>

      <b-col></b-col>

      <b-col>

        <b-button variant="primary" v-b-modal.modal-1 v-on:click="checkPlayerId(); checkBookerId(); checkWaiverId(); checkReservationId(); checkPeopleId();">NEXT</b-button>

      </b-col>
    </b-row>
  </b-container>

  <br> <br>

  </div>

  <div v-show="!waiverSubmitted" class="waiverSubmittedClass">

   <span> Thank you for completing the waiver.<br><br>

    When your team has all completed their waivers, please return to the front desk to finalize payment.

    <br/><br/>

  This app will reset in {{countdownTimer}} seconds. </span>

  <br/> <br/>


  </div>



  <!-- the below div closed the APP div -->
  </div>
  </template>


  <script src="moment.js"></script>
  <script>
  moment().format();
  </script>

  <script src="../dist/vue-date-dropdown.min.js"></script>
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

  // import LoadingScreen from "./components/LoadingScreen";


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

    computed: {
      isDisableComputed() {
        var specialChar = "@";
       if (this.email.includes(specialChar) && this.phone.length > 9 && this.email.length > 6) {
        // if(this.email.length > 6){
          return false;
        // }
      } else {
        return true;
      }

    },


    isDisableFixedFirstName(){
      var specialChar = "@";
     if (this.first_name.includes(specialChar) || this.last_name.includes(specialChar) || this.first_name < 1 || this.last_name < 1) {
      return true;
    } 
    else {
      return false;
    }
  },

  validateGenderField(){
    return this.gender_id.length < 0;
  },

  valiadateHearAboutUs(){
    return this.hearAboutUs.length < 1;
  },

  time: function(){
    return this.date.format('mm:ss');
  },

  // formData(){

  //   return{

  //         first_name: this.first_name
  //         // date_of_birth: this.date_of_birth
        
  //   }

  // }

},

  mounted: function(){

    this.showSignaturePad = true;
    this.$refs.signaturePad.$refs.signaturePadCanvas.width = 400;
    this.$refs.signaturePad.$refs.signaturePadCanvas.height = 400;

   const current = new moment().format("hh:mm");
   var quaterMinute = ["15","30","30","45"];


   let next15Minutes = moment().add(15, 'minutes');
   next15Minutes.minutes(Math.floor(next15Minutes.minutes() / 15) * 15);
   this.timeList.push(next15Minutes.format('h:mm A'));
   const timetest = next15Minutes;
   const timetest1 = next15Minutes;

   for(let i=0;i<5;i++){

    if(i<1){
          //  let currenttime2 = currentTime;
          timetest1.subtract(15, 'minutes');
           timetest1.minutes(Math.floor(timetest1.minutes() / 15) * 15);
           this.timeList.push(timetest1.format('h:mm A'));
          
          //this.timeList.push( moment().format("HH") + ":" + quaterMinute[i] );
           // current.subtract(15, "minutes");
         }
         else{
            timetest.add(15, 'minutes');
          timetest.minutes(Math.floor(timetest.minutes() / 15) * 15);
          this.timeList.push(timetest.format('h:mm A'));
           // next15Minutes.format('HH:mm');
         // this.timeList.push( moment().format("HH") + ":" + quaterMinute[i] );
         //   current.add(15, "minutes");
       }

     }

     this.timeList = [ ...new Set(this.timeList) ];
     this.timeList.sort(); //this will sort out the time from ascending to descending
     // this.timeList.reverse(); //used reverse to change asc/desc to desc/asc

      // var arrivalDate = moment();
      // // console.log(arrivalDate);
      // console.log(this.selectedTime);
       // // console.log(this.arrivalTime1);
       var arrivalDate = moment().format('YYYY-MM-DD');
       var arrivalTime = this.arrivalTime1;
      // // console.log(arrivalTime1);

      // var arrivalTime = '1530';
      // var arrivalTime1 = '1715';

     // axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate&"arrivalTime="+arrivalTime)
     //the link below is for arrival time from one time to other
     //axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+"&items.arrivalTime="+arrivalTime)+","+arrivalTime1
     
     // const AuthStr = 'Bearer '.concat(Af144hp8uKL3ESKoSDlsDR1btaMM4nO1cbdsT8rWvKo);

     axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate,
     {headers: {'X-API-KEY': 'Af144hp8uKL3ESKoSDlsDR1btaMM4nO1cbdsT8rWvKo'}}) 
     .then(response => 
            (this.allbookings = response.data.data));
           this.allbookings.sort();
           console.log(this.allbookings);

    axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+"&items.arrivalTime="+arrivalTime,
     {headers: {'X-API-KEY': 'Af144hp8uKL3ESKoSDlsDR1btaMM4nO1cbdsT8rWvKo'}}) 
    .then(response => 
            (this.posts = response.data.data));
            
           this.posts.sort();
           console.log(this.posts);


    axios.get(process.env.VUE_APP_BOOKERS).then(response => {this.allPlayerList = response.data});

    axios.get(process.env.VUE_APP_RESERVATIONS).then(response => {this.allReservationList = response.data});  



          //  setInterval(() => {
          //   this.date = moment(this.date.subtract(1, 'seconds'))
          // }, 1000)

          

    //  axios.get(("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+"&items.arrivalTime="+arrivalTime), 
    //  {
    //   headers: {
    //     'X-API-KEY': "Af144hp8uKL3ESKoSDlsDR1btaMM4nO1cbdsT8rWvKo",
    //     // 'username': "sandesh.phuyal@beatthebomb.com",
    //     // 'password': "xolasandesh23"
    //   },
    // })
      // .then

     // axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+"&items.arrivalTime="+arrivalTime)
    //  .then(response => 
    //   (this.posts = response.data.data)
    //   );
    //  this.posts.sort();
    //  console.log(this.posts);

    //  setInterval(() => {
    //   this.date = moment(this.date.subtract(1, 'seconds'))
    // }, 1000);

     // axios.get('http://localhost:9090/people/').then(response => {this.playersresult = response.data.slice(-1)});  //this calls at the first

   },


   data() {
    return {
      // customerName: '',
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
      waiverSubmitted: true,
      hearAboutUsDiv: true,
      allreservationamediv: true,
      date: moment(60 * 10 * 1000),
      timerCount: '10',
      minorsChecked: null,

      showSignaturePad: false ,
      allPlayerList: [],
      allReservationList: [],
      // allwaiversList: [],

      allbookings: [],

      bookername: '',
      bookerId: '',
      bookerTeamSize: '',
      bookerAmount: '',
      bookerTravelerId: '',
      bookerEmail: '',
      bookerExperineceId: '', /** this one is tracked down as for mission id **/
      mission_id: '', /** converts bookerExperineceId into 1,2,3 **/
      // bookerTravelerId: '',
      consistsreservationresult:'',
      consistspeopleresult: '', /* this is to pass people id into booking id */
      // inputBookerId: '',

      reservationDateTime: '',

      minorsChecked: 'B',
         optionsSelectedNo: [
         { item: 'A', name: 'YES', value: 'A'},
         { item: 'B', name: 'NO', value: 'B'},
         ],

      // email: '',
      firstname: '',
      lastname: '',
      gender: '',
      // instagram: '',
      phone: '',
      hearAboutUs: [],

      greetings: 'Welcome to BEAT THE BOMB',
      reservationTimeTitle: 'Please select your reservation time:',
      // reservationNameTitle: 'Please select name of the person <br> who booked your reservation:',
      reservationNameTitle: 'Please select name of the person who booked your reservation:',
      genderNameTitle: 'Whats your gender ?',
      minorNameTitle: 'Are you responsible for any minors in your group today?',
      minorNameTitle1: 'Do you have any minors you are signing a waiver for today?',
      signDivTitle: 'Please review our waiver and then sign below.',
      noBookingTitle: 'No booking name. Please go back and select your booking time.',
      instagramTitle: "Instagram Username ",
      phoneTitle: "Phone number for Team Beat The Bomb Images",
      hearAboutUsTitle: 'Where did you first hear about us ?',
      modalTimeDialog: false,
      modalNameDialog: false,
      randomNumber: "https://btbwaiver/llecnas9841"+Math.floor(Math.random() * 1000000000)+"652602/",
      selectedDate: '',
      months: 'Jan, Feb, Mar, Apr, May, Jun, July, Aug, Sep, Oct, Nov, Dec',
      timeList: [],
      posts: [],
      countdownTimer:'10',

      playersresult: [],
      bookerresult: [],
      reservationrresult: [],
      peoplresult: [],
      waiverresult: [],
      playerLastId:  '',
      lastPlayerData: [],
      controlPlayerData: [],
      show: false, // this one is for last submit button to close on click

      form:{
        email: '',
        name: '',
        firstname: '',
        lastname:'',
        dateofbirth: ''
           // food: ''
         },
         show: true,
         selected: '1',
         // options: [
         // { promotionalitem: 'A', name: 'YES' },
         // { promotionalitem: 'B', name: 'NO' },
         // ],

         genderoptions: [
         {genderitem: '1', name: 'Female'},
         {genderitem: '2', name: 'Male'},
         {genderitem: '3', name: 'Non-binary'},
         {genderitem: '4', name: 'I would prefer not to answer'}
         ],

         signatureoptions:{
          penColor: "black"
        },

        minorsDetail: [
        {
          first_name: "",
          date_of_birth: "",
          // title: "Date of Birth"
        }
        ],

        /* post data to api*/
        // first_name:"",
        last_name:"",
        date_of_birth:"1993-10-25",
        gender_id:"",
        promotional_item:"1",
        instagram:"",
        email:"",
        /* above are items posted for people table*/

        first_name:"",
        // date_of_birth:[],

        /*below are the objects posted for player_minors table*/
        // minordatabase:[
        // {
        //   date_of_birth:"",
        //   first_name:""
        // }
        // ],
        /* end of player_minors table*/

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

      // getallreservation(){
      //   console.log("san");
      //   var arrivalDate = moment().format('YYYY-MM-DD');
      //   axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+,
      //   {headers: {'X-API-KEY': 'Af144hp8uKL3ESKoSDlsDR1btaMM4nO1cbdsT8rWvKo'}}) 
      //   .then(response => 
      //       (this.allbookings = response.data.data));
      //      this.allbookings.sort();
      //   console.log(this.allbookings);
      // },

      checkMissionId(){
        console.log("print mission id");
        console.log(this.bookerAmount);
        console.log(this.bookerExperineceId);
        if(this.bookerExperineceId == "5e2077dfdbc7032265381d36"){
          this.mission_id = 1;
          console.log(this.mission_id);
        }
        if(this.bookerExperineceId == "5e207a68e86c5039be447ecc"){
          this.mission_id = 2;
          console.log(this.mission_id);
        }
      },

      clickedTimer(){
        var time = 11;
        var duration = moment.duration(time, "seconds");
        var interval = 1000;

        setInterval(() => {
          duration.subtract(interval, "milliseconds"); //using momentjs substract function
          this.countdownTimer = moment(duration.asMilliseconds()).format('s'); 
          // console.log(moment(duration.asMilliseconds()).format('s'));
        }, interval );
      },

      bookerName(index){

          console.log(this.posts[index].items[0].experience.id);

          this.bookername = this.posts[index].customerName;
          this.bookerId = this.posts[index].id;
          this.bookerTeamSize = this.posts[index].items[0].quantity;
          this.bookerAmount = this.posts[index].items[0].amount;
          this.bookerTravelerId = this.posts[index].travelers[0].id;
          this.bookerExperineceId = this.posts[index].items[0].experience.id;
          this.bookerEmail = this.posts[index].customerEmail;
          // this.bookerPhoneNumber = this.post[index].customerNumber;
          // this.bookerTravelerId = this.posts[index].id;
        },
              
      hideModal() {
        this.$refs['my-modal-submit-id'].hide()
      },
      
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

        signatureLoad(){
          this.showWithResize();
        },

        showWithResize() {
          this.isShow = true
          this.$refs.signaturePad.$refs.signaturePadCanvas.width = 250
          this.$refs.signaturePad.$refs.signaturePadCanvas.height = 250
          },

        undo() {
          this.$refs.signaturePad.undoSignature();
        },
        save() {
          const { isEmpty, data } = this.$refs.signaturePad.saveSignature();

          alert("Open DevTools see the save data.");
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
            first_name: '',
            // date_of_birth: ''
          })

          // this.playerLastId = this.playersresult.id; // this is the line which passes value from playerresult to playerid

        },

        removeExperience: function(todo){

          var index = this.minorsDetail.indexOf(todo)
          this.minorsDetail.splice(index, 1)
        },

        submit () {
          const data = {
            minorsDetail: this.minorsDetail
          }
          alert(JSON.stringify(data, null, 2))
          // alert(minordatabase.first_name)
        },

        removeDuplicates () {
          this.timeList = [ ...new Set(this.timeList) ]
        },

       showTheTime: function (){
        // alert(this.selectedTime);
         // // console.log(event.target.value);
         var standardTimeFormat = event.target.value;
         this.reservationDateTime = standardTimeFormat +' '+ moment(moment.now()).format("YYYY/MM/DD");
         console.log(this.reservationDateTime);

        var militaryTimeFormat = moment(standardTimeFormat, "h:mm A").format("HHmm");

        var arrivalDate = moment().format('YYYY-MM-DD');
      // var arrivalTime = this.militaryTimeFormat;
      axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate+"&items.arrivalTime="+militaryTimeFormat,
        {headers:{'X-API-KEY':'Af144hp8uKL3ESKoSDlsDR1btaMM4nO1cbdsT8rWvKo'}})
      .then(response => (this.posts = response.data.data));

      document.getElementById("hideDiv").style.visibility="visible";
      setTimeout("hideDiv",3000);

    },

    reloadfunction(){
      setTimeout(location.reload.bind(location), 8500);
    },



    showAllTime: function (event){

      var arrivalDate = moment().format('YYYY-MM-DD');

      axios.get("https://sandbox.xola.com/api/orders?seller=5e1f43c0c697353cf12979e7&items.arrival="+arrivalDate,{headers:{'X-API-KEY':'Af144hp8uKL3ESKoSDlsDR1btaMM4nO1cbdsT8rWvKo'}})
      .then(response => (this.posts = response.data.data));

    },


    isDisableFixed(email) {
      return email.length > 5;
    },

    validateInstagram(instagram){
      return text.length > 3;
    },

    validatephone(phone){
      return text.length > 9;
    },

    isDisableFixedFName(firstname) {
      return text.length > 2;
    },

    disableLastName(lastname){
      return text.length > 2;
    },

    validateGender(gender){
      return text.length > 0;
    },

    // valiadateHearAboutUs(hearAboutUs){
    //   return text.length > 0;
    // },

    checkedMinor(){
      $('input.chk').on('change', function() {
      $('input.chk').not(this).prop('checked', false);  
  });
    },

    checkPlayerId(){
        axios.get(process.env.VUE_APP_PEOPLE).then(response => {this.playersresult = response.data.slice(-1)}); // this get id for player_minor table id
        console.log('inside check player');
      },

    checkBookerId(){
        axios.get(process.env.VUE_APP_BOOKERS).then(response => {this.bookerresult = response.data.slice(-1)}); // this get id for player_minor table id
        // console.log('inside bookers');
      },

    checkReservationId(){
      axios.get(process.env.VUE_APP_RESERVATIONS).then(response => {this.reservationrresult = response.data.slice(-1)}); 
      console.log('inside reservation');

      // axios.get(process.env.VUE_APP_RESERVATIONS+'').then(response => {this.samereservationresult = response.data.slice(-1)});
      // console.log(process.env.VUE_APP_RESERVATIONS+'/find_or_create/'+san);
    },

    checkWaiverId(){
     axios.get(process.env.VUE_APP_WAIVERS).then(response => {this.waiverresult = response.data.slice(-1)});
    },

    postReservationData(){
      var reservationOrderId = this.bookerTravelerId;

      var bookerDataId = this.bookerresult[0];
      // var checkEmptyBooking = Object.keys(bookerDataId).length;

      if(bookerDataId == null){
        var bookerwithid = '0';
      }
      else{
        var bookerwithid = bookerDataId['id'];
      }

        console.log(reservationOrderId);
        axios.post(process.env.VUE_APP_RESERVATIONS+'/find_or_create/'+reservationOrderId,{
            // person_id: sand + 1,
            xola_order_id: this.bookerTravelerId,
            size: this.bookerTeamSize,
            booker_id: bookerwithid + 1,
            final_dollar_amount: this.bookerAmount,
            reservation_for: this.reservationDateTime,
            location_id: 1,
            mission_id: this.mission_id
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    },

    postPeopleData(){
      var reservationOrderByEmail = this.bookerEmail;
      axios.post(process.env.VUE_APP_PEOPLE+'/find_or_create/'+reservationOrderByEmail,{
            // person_id: sand + 1,
            email: this.bookerEmail,
            first_name: this.bookerName,
            // booker_id: bookerwithid + 1,
            // final_dollar_amount: this.bookerAmount,
            // reservation_for: this.reservationDateTime,
            // location_id: 1,
            // mission_id: this.mission_id
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    },

    checkReservationId(){
      var reservationOrderId = this.bookerTravelerId;
      axios.post(process.env.VUE_APP_RESERVATIONS+'/find_or_create/'+reservationOrderId).then(response => {this.consistsreservationresult = response.data});
      console.log(this.bookerTravelerId);
    },

    checkPeopleId(){
      var reservationOrderByEmail = this.bookerEmail;
      axios.post(process.env.VUE_APP_PEOPLE+'/find_or_create/'+reservationOrderByEmail).then(response => {this.consistspeopleresult = response.data});
      console.log(this.bookerEmail);
    },

    submitPlayerForm(){

      var waiverDataId = this.waiverresult[0];
       if(waiverDataId == null){
          var waiverid = '0';
        }
        else{
          var waiverid = waiverDataId['id'];
        }

      /** axios post on waiver table **/
      axios.post(process.env.VUE_APP_WAIVERS,{
        waiver_url : this.randomNumber
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });

      var reservationOrderByEmail = this.bookerEmail;
      axios.post(process.env.VUE_APP_PEOPLE+'/find_or_create/'+reservationOrderByEmail,{
        first_name: this.bookername,
        // last_name: this.last_name,
        date_of_birth: this.date_of_birth,
        gender_id: this.gender_id,
        marketing_consent: this.promotional_item,
        phone: this.phone,
        email: this.bookerEmail,
        instagram: this.instagram,
        // waiver_id: waiverid + 1
      })

      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });

    },


    submitMinorForm(){

      var waiverDataId = this.waiverresult[0];
       if(waiverDataId == null){
          var waiverid = '0';
        }
        else{
          var waiverid = waiverDataId['id'];
        }

      var controlPlayerData = this.playersresult[0];
      if(controlPlayerData == null){
        var sand = '0';
      }
      else{
        var sand = controlPlayerData['id'];
      }

      // var sand = controlPlayerData['id'];
      // variable defined for booker id
      var bookerDataId = this.bookerresult[0];
      // var checkEmptyBooking = Object.keys(bookerDataId).length;

      if(bookerDataId == null){
        var bookerwithid = '0';
      }
      else{
        var bookerwithid = bookerDataId['id'];
      }

      var reservationDataId = this.consistsreservationresult[0];
      if(reservationDataId == null){
        var reservationwithid = '0';
      }
      else{
        var reservationwithid = reservationDataId['id'];
      }

      var peopleDataId = this.consistspeopleresult[0];
      if(peopleDataId == null){
        var peoplewithid = '0';
      }
      else{
        var peoplewithid = peopleDataId['id'];
      }

      var reservationNewDataId = this.reservationrresult[0];
       if(reservationNewDataId == null){
          var reservationwithnewid = '0';
        }
        else{
          var reservationwithnewid = reservationNewDataId['id'];
        }
      
      /** axios post the bookers table **/
          var found = this.allPlayerList.find((todo) => {
            return todo.xola_booker_id == this.bookerId
          })

          // If nothing is found, Array.find() returns undefined, which is false-y

          if (found) {
            console.log("already inserted")
              } 
          else {
            
            console.log("new id");
              axios.post(process.env.VUE_APP_BOOKERS,{
                person_id: peoplewithid,
                xola_booker_id: this.bookerId
              })
              .then(function (response) {
                console.log(response);
              })
              .catch(function (error) {
                console.log(error);
              });
            }
          /** end of bookers table **/


      axios.post(process.env.VUE_APP_PLAYERS,{
        person_id: sand + 1
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      });

      console.log(this.email);
      console.log(this.consistspeopleresult);
      var foundPeopleEmailId = this.consistspeopleresult.find((todo)=>{
        return todo.email == this.bookerEmail
      })
      if(foundPeopleEmailId){
        console.log("Found Email");
        /** this inserts the new player under booking name **/
        var reservationOrderByEmail = this.email;
        axios.post(process.env.VUE_APP_PEOPLE+'/find_or_create/'+reservationOrderByEmail,{
          first_name: this.first_name,
          last_name: this.last_name,
          date_of_birth: this.date_of_birth,
          gender_id: this.gender_id,
          marketing_consent: this.promotional_item,
          phone: this.phone,
          // email: this.bookerEmail,
          instagram: this.instagram,
          waiver_id: waiverid + 1
        })

        .then(function (response) {
          console.log(response);
        })
        .catch(function (error) {
          console.log(error);
        });
        /** end of player booking inserts **/

        /** if booker is player as well **/
        if(this.email == this.bookerEmail){
          console.log("same email used");
          // var reservationBookerEmail = this.email;
          console.log(peoplewithid);
          console.log(process.env.VUE_APP_PEOPLE+'/'+peoplewithid);
          axios.put(process.env.VUE_APP_PEOPLE+'/'+peoplewithid,{
          first_name: this.first_name,
          last_name: this.last_name,
          date_of_birth: this.date_of_birth,
          gender_id: this.gender_id,
          marketing_consent: this.promotional_item,
          phone: this.phone,
          // email: this.bookerEmail,
          instagram: this.instagram,
          waiver_id: waiverid + 1
          })

          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
        }
        
        /** end of booker who is player as well */
      }
      else{
          /** checks the booker was inserted before or not then only inserts **/
          console.log("email not found");
      }

        /** axios post the bookers table **/

      var foundTravelId = this.consistsreservationresult.find((todo) => {
        return todo.xola_order_id == this.bookerTravelerId
        // console.log(todo.travelers.id);
      })

      // If nothing is foundTravelId, Array.find() returns undefined, which is false-y

      if (foundTravelId) {
        // console.log("already inserted travel id");
        console.log(reservationwithid);

        /** axios post on reservation_people table**/

          axios.post(process.env.VUE_APP_RESERVATIONPEOPLE,{
            person_id: sand + 1,
            reservation_id: reservationwithid
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });

      } 
      
      else {

          /** axios post on reservation_people table**/

          axios.post(process.env.VUE_APP_RESERVATIONPEOPLE,{
            person_id: sand + 1,
            reservation_id: reservationwithnewid + 1
          })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });

        }

        /** end of bookers table **/

        /** check the reservation id for reservation_people table **/

        var foundReservationId = this.reservationrresult.find((todo) => {
          return todo.xola_order_id == this.bookerTravelerId
          // console.log(todo.travelers.id);
        })

        /** end of reservation_people table **/


      /** if function submits to different database if it contains value on it only **/

      var arr = this.minorsDetail;
      var minorvalue = this.minorsDetail[0].first_name;
      // console.log(this.minorsDetail);

      if (minorvalue.length > 0) {
        for(var i=0; i < arr.length; i++){

             axios.post(process.env.VUE_APP_PLAYERMINOR,{
              first_name: arr[i]['first_name'],
              date_of_birth: arr[i]['date_of_birth'],
              player_id: sand + 1
            })

            .then(function (response) {
              console.log(response);
            })
            .catch(function (error) {
              console.log(error);
            });
            console.log("Minors added");
        }
      }

      else{
        console.log("No Minors");
      }

      
      
      
    }


  }

  }

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
    width: 70%; 
    margin-right:auto; 
    margin-left:auto;
    background-color: #fff;
    height: auto;
  }

  #signature {
  border: double 3px transparent;
  border-radius: 5px;
  background-image: linear-gradient(white, white),
    radial-gradient(circle at top left, #4bc5e8, #9f6274);
  background-origin: border-box;
  background-clip: content-box, border-box;
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

  #genderText{
    font-size: 1.2em;
  }

  .nameTitle{
    font-size: 1.1em;
    text-align: left;
    margin-left: 21%;
  }

  .fullNameTitle{
    font-size: 1.3em;
    text-align: left;
    margin-left: 21%;
  }

  .reservationTimeOption{
    width: 50%;
    font-size: 1.3em;
  }

  .instagramField{
    width: 60%;
    margin: auto;
  }

  .selectedBookingTime{
    font-size: 1.5em;
  }

  .waiverSubmittedClass{
    font-size: 1.1em;
    text-align: left;
    margin-top: 8%;
    margin-left: 5%;
    color: #17a2b8;
  }

  #minorsInputFullname{
    margin-left: 0%;
  }

  #minorsInputDiv{
    margin-right: 7%;
  }

  #hearAboutUsDiv{
    text-align: left;
    margin-left: auto;
    margin-right: auto;
    width: 60%;
    font-size: 1.2em;
  }

  .work-experiences > div {
    margin: 20px 0;
    padding-bottom: 10px;
  }
  .work-experiences > div:not(:last-child) {
    border-bottom: 1px solid rgb(206, 212, 218);
  }
  </style>