<template lang="">
 
<header aria-label="Site Header" class="shadow-lg bg-gabble-green">

<div class="mx-auto flex h-16 max-w-screen-xl items-center justify-between px-4 ">
    
    <!-- LOGO -->
   
  <a href="/">
    <img src="../images/C-Y-red.png" alt="Commit_YOWL Logo" class="shadow-lg h-12 w-12">
  </a>
  
    
  <!-- BOUTON POUR DASHBOARD  VERSION MOBILE-->
  <div class="flex w-0 flex-1 lg:hidden ml-4 md:hidden" v-if="non_authenticate">
    <button class=" rounded-full bg-gray-100  text-gray-600" type="button">
      <span class="sr-only">Account</span>
      <a :href="[this.dahsboard]" class="">
      <svg class="h-9 w-9 bg-gray-100 p-1 border-2 border-cardinal rounded-full stroke-verdigri hover:stroke-white hover:bg-gradient-to-r  from-verdigri via-CGBlue to-eagle-green" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
      </a>
    </button>
  </div>
 

    <!-- MENU DESKTOP -->

<nav aria-label="Site Nav" class="hidden items-center justify-center gap-8 text-sm font-medium md:flex lg:flex lg:w-0 lg:flex-1 mt-6">
      
    <!-- button Home -->
      <div class="Home flex border-gray-300 -mt-4">
        <button   @click="letsgo('home')" class="flex items-center rounded-lg  px-4 p-1 text-gray-600 hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white">
          <svg class="md:w-6 md:h-6 lg:w-8 lg:h-8 stroke-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
        </button>
      </div>

      <!-- button pour voir tous les posts dans -->
        <!-- <div class="flex rounded-lg border-gray-300 -mt-6">
          <button class="" >
              <span class="border-[2px] border-white p-[6px] rounded"><i class="bi bi-list-stars text-white text-2xl"></i></span>
            </button>
        </div> -->
      <div class="Home flex border-gray-300 -mt-4">
        <button   @click="letsgo('allposts')" class="flex items-center rounded-lg  px-4 p-1 text-gray-600 hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white">
          <span class="border-[2px] border-white p-[2px] rounded"><i class="bi bi-list-stars text-white text"></i></span>
        </button>
      </div>



<!-- {{-- ------Bouton User }} -->

<div class="dashboard -mt-4" v-if="non_authenticate">
  
  <a :href="[this.dahsboard]" class="">
  <svg class="h-9 w-9 bg-gray-100 p-1 border-2 border-cardinal rounded-full stroke-verdigri hover:stroke-white hover:bg-gradient-to-r  from-verdigri via-CGBlue to-eagle-green" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
  </a>

</div> 

</nav>
  
  <div class="hidden items-center gap-4 md:flex lg:flex" v-if="authenticate">
  <!-- BOUTON LOG IN -->

        <a
          :href="[this.login]"
          class="rounded-lg bg-gray-100 hover:text-white hover:bg-gradient-to-r  from-verdigri via-CGBlue to-eagle-green px-5 py-2 text-sm font-medium text-gray-600"
        >
         <p> Log in</p>
        </a>

  <!-- BOUTON SIGN UP -->
        <a
        :href="[this.register]"
          class="rounded-lg text-gray-600 bg-gray-100 hover:text-white hover:bg-gradient-to-r  from-verdigri via-CGBlue to-eagle-green px-5 py-2 text-sm font-medium"
        >
          Sign up
        </a>
  </div> 

</div>



  <!-- {{-- -----------------Mobile-------------------------- --}} -->


<div class="border-t border-gray-100 md:hidden">
  <nav class="flex items-center space-x-6 justify-center overflow-x-auto p-4 text-sm font-medium" >

<!-- button home -->
      <div class="flex">
        <button @click="letsgo('home')" class="flex items-center rounded-lg  px-4 p-1 text-gray-600 hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white">
          <svg class="w-6 stroke-white  " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
        </button>
      </div>

      
<!-- button addPost -->
        <div class="flex">
          <button  @click="getauthenticate()" class="flex items-center rounded-lg  px-4 p-1 text-gray-600 hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white">
            <svg class="w-6 h-6 stroke-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          </button>
        </div>
      

<!-- button tous les posts -->
        <div class="flex ">
          <a href="/allposts" class="flex items-center rounded-lg  px-4 p-1 text-gray-600 hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white">
            <i class="bi bi-list-stars text-white text-2xl"></i>
          </a>
        </div>

      
 <!-- button login -->
        <div class="flex " v-if="authenticate">
          <a :href="[this.login]" class="flex items-center rounded-lg  px-4 p-1 text-gray-600 hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white">
            <svg class="w-6 h-6 stroke-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
          </a>
       
        </div>
<!-- button Register -->
         <div class="flex " v-if="authenticate">
          <a :href="[this.register]" class="flex items-center rounded-lg  px-4 p-1 text-gray-600 hover:bg-gradient-to-r from-red-900 via-red-600 to-red-500 hover:text-white">
            <svg class="w-6 h-6 stroke-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
          </a>
        </div>


  </nav>
</div>

  </header>

</template>



<script>
export default {
  data(){
    return{
      register: this.$path+'register',
      login: this.$path+'login',
      home:this.$path,
      logout:'logout',
      dahsboard: this.$path+'dashboard',
      authenticate:false,
      non_authenticate:false,
      user_id:'',
      user_name:'',
      admin:0,
      
    }
  },
 
    methods:{
      letsgo(here){
        this.$router.push({
            name: here
            });
      },

      getauthenticate(){
        var myHeaders = new Headers();
        myHeaders.append("Accept", "application/json");

        var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        redirect: 'follow'
        };

        fetch(this.$path + "api/createpost", requestOptions)
        .then(response => response.json())
        .then(result => { 
                
                if (result.message=="Unauthenticated."){
                    
                    this.$swal("Super initiative.Pour créer un post mais il faut s'identifier!").then(result=>{
                    window.location.href = this.$path + "login";
                
                })
                
            }
            
            })
        .catch(error => console.log('error', error));
            },

      getUserId(){
        var myHeaders = new Headers();
        myHeaders.append("accept", "application/json");

        var requestOptions = {
          method: 'GET',
          headers: myHeaders,
          redirect: 'follow'
        };

        fetch(this.$path + "api/whoami", requestOptions)
          .then(response => response.text())
          .then(result => {
            console.log("user: ")
            console.log(result);
            let contenu = JSON.parse(result);
            if (contenu.id > 0){
              this.user_id=contenu.id;
              this.admin=contenu.admin;
              this.user_name=contenu.name;
              console.log(this.user_name+" "+this.user_id+" "+this.admin);
              this.authenticate=false;
              this.non_authenticate=true;
              //contenu.message=="Unauthenticated."){
                    
                    // this.$swal("Super initiative.Pour créer un post mais il faut s'identifier!").then(result=>{
                    // window.location.href = this.$path + "login";
                
                // })
                // console.log('Your are GUEST on our site!');
                // this.authenticate=true;
                
            }else{
              // this.user_id=contenu.id;
              // this.admin=contenu.admin;
              // this.user_name=contenu.name;
              // console.log(this.user_name+" "+this.user_id+" "+this.admin);
              // this.authenticate=false;
              // this.non_authenticate=true;
              console.log('Your are GUEST on our site!');
                this.authenticate=true;

            }


          
          })
          .catch(error => {console.log('error', error);this.authenticate=true;})
      },
    
  }, 

// fin methods

created(){
  
  this.getUserId();
}

}

</script>
<style lang="">
  
</style>
