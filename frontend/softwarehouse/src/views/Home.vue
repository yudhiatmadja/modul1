<script>
import Navbar from '../components/Navbar.vue';
import Layout from '../components/Layout.vue';
import Main from '../components/Main.vue';
import Form from '../components/Form.vue';


export default {
  name: 'Home',
  components: {
    Navbar,
    Layout,
    Main,
    Form,
  },
};
</script>


<template>
  <Layout>
    <div>
      <Navbar />
       <Main />
       <Form/>
    </div>
  </Layout>
</template>
