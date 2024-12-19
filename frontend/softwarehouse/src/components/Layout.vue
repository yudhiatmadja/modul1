<template>
    <div>
      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
  
        <title>{{ title }}</title>
  
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://api.fontshare.com/v2/css?f[]=clash-display@600&display=swap" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" />
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" :href="assetPath('images/title.png')" />
      </head>
  
      <body class=" font-['Poppins'] w-full m-0">
        <Navbar v-if="!isAdminPage" />
        <slot />
      </body>
    </div>
  </template>
  
  <script>
  import Navbar from "./Navbar.vue";
  
  export default {
    name: "Layout",
    props: {
      title: {
        type: String,
        default: "Default Title",
      },
      modalOpen: {
        type: Boolean,
        default: false,
      },
    },
    computed: {
      // Check if the current page is an admin page
      isAdminPage() {
        return window.location.pathname.startsWith("/admin");
      },
    },
    methods: {
      // Helper method to resolve asset paths
      assetPath(path) {
        return new URL(path, import.meta.url).href;
      },
      // Show modal if modalOpen is true
      handleModal() {
        if (this.modalOpen) {
          const modal = document.getElementById('my_modal_3');
          if (modal) {
            modal.showModal();
          }
        }
      },
    },
    mounted() {
      // Call handleModal when component is mounted
      this.handleModal();
    },
  };
  </script>
  
  <style>
  /* Tambahkan CSS opsional di sini */
  </style>
  