<template lang="">
<!-- BARRE DE RECHERCHE -->

<form> 
    <div class="flex lg:justify-end"> 
        <label 
            for="default-search" 
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">
            Search
        </label>

        <div class="relative grid grid-rows-2 lg:grid-rows-1 w-full lg:w-5/6">
            <!-- INPUT -->
            <div>
                <!-- LOUPE -->
                <div class="absolute pl-2 pt-4 pointer-events-none">
                <svg aria-hidden="true" class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            <input 
                type="search" id="default-search" 
                class="flex w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-downy focus:border-downy" 
                placeholder="Search category, keywords..." required>

            <!-- BOUTON SEARCH -->
            <button 
                type="submit" 
                class="text-gray-800 lg:text-white absolute md:right-1 5 bottom-2.5 w-full md:w-2/6 bg-downy lg:bg-san-juan hover:bg-hoki focus:ring-4 focus:outline-none focus:ring-cardinal font-medium rounded-lg text-sm py-2">
                Search
            </button>

            </div>
        </div>
    </div> 
</form>

</template>


<script>
export default {
    
}
</script>
