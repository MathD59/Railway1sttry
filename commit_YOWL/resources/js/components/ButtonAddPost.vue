<template lang="">
    <router-link to="addpost">
        <button
        @click="getauthenticate()"
            type="button" 
            class="grid justify-items-center w-full md:w-3/4 bg-gradient-to-r from-cardinal/50 via-cardinal/70 to-cardinal hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-white shadow-lg shadow-cardinal/50 rounded-lg text-sm text-white lg:px-5 lg:py-2.5">
            <img class=" lg:ml-2 h-10 w-10 md:h-12 md:w-12" 
            src="../images/icon_plus_96.png" alt="Addpost"/>
            <span class="text-xs md:text-sm lg:text-lg">Add Post</span>
        </button>  

    </router-link> 

 

</template>


<script>
export default {
  methods:{

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
                console.log(result);
                if (result.message=="Unauthenticated."){
                    
                    this.$swal("Super initiative. Pour créer un post il faut s'identifier!").then(result=>{
                    window.location.href = this.$path + "login";
                
                })
                
            }
            
            })
        .catch(error => console.log('error', error));
            }
        }
    }
    

</script>
