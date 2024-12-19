<template>
  <div class="flex flex-col gap-5 justify-between">
    <!-- Order Form -->
    <div class="w-full md:w-1/2 p-4">
      <h1>Order</h1>
      <form @submit.prevent="submitOrder" class="p-4 bg-white shadow rounded-lg flex flex-col items-center">
        <div class="mb-4 flex flex-col items-center w-full">
          <label class="block text-sm font-medium">Name</label>
          <input v-model="order.name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
        </div>
        <div class="mb-4 flex flex-col items-center w-full">
          <label class="block text-sm font-medium">Email</label>
          <input v-model="order.email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
        </div>
        <div class="mb-4 flex flex-col items-center w-full">
          <label class="block text-sm font-medium">Phone Number</label>
          <input v-model="order.number" type="tel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
        </div>
        <div class="mb-4 flex flex-col items-center w-full">
          <label class="text-sm font-medium">Description</label>
          <textarea v-model="order.description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
        </div>
        <div class="mb-4 flex flex-col items-center w-full">
          <label class="text-sm font-medium">Domain</label>
          <select v-model="order.option" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value=".com">.com</option>
            <option value=".id">.id</option>
            <option value=".co.id">.co.id</option>
          </select>
        </div>
        <div class="mb-4 flex flex-col items-center w-full">
          <label class="text-sm font-medium">Payment Proof</label>
          <input type="file" @change="handleFileUpload" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
      </form>
    </div>

    <!-- Testimonial Form -->
    <div class="w-full md:w-1/2 p-4">
      <h1>Kirim Testimoni</h1>
      <form @submit.prevent="submitTestimonial" class="p-4 bg-white shadow rounded-lg">
        <div class="mb-4">
          <label class="block text-sm font-medium">Name</label>
          <input v-model="testimonial.name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium">Email</label>
          <input v-model="testimonial.email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium">Testimonial</label>
          <textarea v-model="testimonial.testi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
        </div>
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Submit</button>
      </form>
    </div>

    <!-- Orders Section -->
    <!-- <div>
      <h2>Orders List</h2>
      <ul>
        <li v-for="o in orders" :key="o.id" class="mb-2">
          <div v-if="o.isEditing">
            <input v-model="o.name" placeholder="Name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
            <input v-model="o.email" placeholder="Email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
            <select v-model="o.option" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
              <option value=".com">.com</option>
              <option value=".id">.id</option>
              <option value=".co.id">.co.id</option>
            </select>
            <button @click="saveOrder(o)" class="text-green-500">Save</button>
            <button @click="cancelEdit(o)" class="text-gray-500">Cancel</button>
          </div>
          <div v-else>
            <p>{{ o.name }} - {{ o.email }} - {{ o.option }}</p>
            <button @click="editOrder(o)" class="text-blue-500">Edit</button>
            <button @click="deleteOrder(o.id)" class="text-red-500">Delete</button>
          </div>
        </li>
      </ul>
    </div> -->

    <div>
  <h2 class="font-bold text-4xl mb-3">Orders List</h2>
  <table class="table-auto w-full border-collapse border border-gray-300">
    <thead>
      <tr>
        <th class="border border-gray-300 px-4 py-2">Name</th>
        <th class="border border-gray-300 px-4 py-2">Email</th>
        <th class="border border-gray-300 px-4 py-2">Option</th>
        <th class="border border-gray-300 px-4 py-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="o in orders" :key="o.id">
        <template v-if="o.isEditing">
          <td class="border border-gray-300 px-4 py-2">
            <input v-model="o.name" placeholder="Name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <input v-model="o.email" placeholder="Email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <select v-model="o.option" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
              <option value=".com">.com</option>
              <option value=".id">.id</option>
              <option value=".co.id">.co.id</option>
            </select>
          </td>
          <td class="border border-gray-300 px-4 py-2">
            <button @click="saveOrder(o)" class="text-green-500">Save</button>
            <button @click="cancelEdit(o)" class="text-gray-500">Cancel</button>
          </td>
        </template>
        <template v-else>
          <td class="border border-gray-300 px-4 py-2">{{ o.name }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ o.email }}</td>
          <td class="border border-gray-300 px-4 py-2">{{ o.option }}</td>
          <td class="border border-gray-300 px-4 py-2">
            <button @click="editOrder(o)" class="text-blue-500">Edit</button>
            <button @click="deleteOrder(o.id)" class="text-red-500">Delete</button>
          </td>
        </template>
      </tr>
    </tbody>
  </table>
</div>
</div>


    <!-- Testimonials Section -->
    <!-- <div>
      <h2>Testimonials List</h2>
      <ul>
        <li v-for="t in testimonials" :key="t.id" class="mb-2">
          <div v-if="t.isEditing">
            <input v-model="t.name" placeholder="Name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
            <textarea v-model="t.testi" placeholder="Testimonial" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
            <button @click="saveTestimonial(t)" class="text-green-500">Save</button>
            <button @click="cancelEditTestimonial(t)" class="text-gray-500">Cancel</button>
          </div>
          <div v-else>
            <p>{{ t.name }}: {{ t.testi }}</p>
            <button @click="editTestimonial(t)" class="text-blue-500">Edit</button>
            <button @click="deleteTestimonial(t.id)" class="text-red-500">Delete</button>
          </div>
        </li>
      </ul>
    </div>
  </div> -->

  <div>
  <h2 class="font-bold text-4xl my-3">Testimonials List</h2>
  <table class="min-w-full border-collapse border border-gray-300">
    <thead>
      <tr>
        <th class="border border-gray-300 px-4 py-2">Name</th>
        <th class="border border-gray-300 px-4 py-2">Testimonial</th>
        <th class="border border-gray-300 px-4 py-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="t in testimonials" :key="t.id" class="border-t">
        <td v-if="t.isEditing" class="border border-gray-300 px-4 py-2">
          <input 
            v-model="t.name" 
            placeholder="Name" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" 
          />
        </td>
        <td v-else class="border border-gray-300 px-4 py-2">
          {{ t.name }}
        </td>
        <td v-if="t.isEditing" class="border border-gray-300 px-4 py-2">
          <textarea 
            v-model="t.testi" 
            placeholder="Testimonial" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
          ></textarea>
        </td>
        <td v-else class="border border-gray-300 px-4 py-2">
          {{ t.testi }}
        </td>
        <td class="border border-gray-300 px-4 py-2">
          <div v-if="t.isEditing">
            <button 
              @click="saveTestimonial(t)" 
              class="text-green-500 mr-2"
            >
              Save
            </button>
            <button 
              @click="cancelEditTestimonial(t)" 
              class="text-gray-500"
            >
              Cancel
            </button>
          </div>
          <div v-else>
            <button 
              @click="editTestimonial(t)" 
              class="text-blue-500 mr-2"
            >
              Edit
            </button>
            <button 
              @click="deleteTestimonial(t.id)" 
              class="text-red-500"
            >
              Delete
            </button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

</template>

<script lang="ts">
import { defineComponent, reactive, ref, onMounted } from 'vue';
import api from '../services/api';
import axios from 'axios';

export default defineComponent({
  name: 'Form',
  setup(_, { emit }) {
    const order = reactive({
      id: null,
      name: '',
      email: '',
      number: '',
      description: '',
      option: '',
      payment_proof: null as File | null,
      isEditing: false 
    });

    const testimonial = reactive({
      id: null,
      name: '',
      email: '',
      testi: '',
      isEditing: false 
    });

    const orders = ref([]);
    const testimonials = ref([]);

    const handleFileUpload = (event: Event) => {
      const file = (event.target as HTMLInputElement).files?.[0] || null;
      order.payment_proof = file;
    };

    const submitOrder = async () => {
      try {
        const formData = new FormData();
        formData.append('name', order.name);
        formData.append('email', order.email);
        formData.append('number', order.number);
        formData.append('description', order.description);
        formData.append('option', order.option);
        if (order.payment_proof) {
          formData.append('payment_proof', order.payment_proof);
        }
        await api.addOrder(formData);
        alert('Order submitted!');
        emit('orderSubmitted');
        resetOrderForm();
      } catch (error) {
        console.error('Error submitting order:', error);
      }
    };

    const submitTestimonial = async () => {
      try {
        await api.addTestimonial(testimonial);
        alert('Testimonial submitted!');
        emit('testimonialSubmitted');
        resetTestimonialForm();
      } catch (error) {
        console.error('Error submitting testimonial:', error);
      }
    };

    const editOrder = (order) => {
      order.isEditing = true; 
    };

    const cancelEdit = (order) => {
      Object.assign(order, { isEditing: false }); 
    };

    const saveOrder = async function(order) {
  try {
    const response = await axios.put(`/api/orders/${order.id}`, order);

    if (response.status === 200) {
      order.isEditing = false;
      this.$emit('orderUpdated');
    } else {
      console.error('Unexpected response status:', response.status);
      alert('Failed to update order. Please try again later.');
    }
  } catch (error) {
    console.error('Error updating order:', error.response ? error.response.data : error.message);
    alert('Failed to update order. Please try again later.');
  }
};



    const deleteOrder = async (id) => {
      try {
        await api.deleteOrder(id);
        emit('orderDeleted');
      } catch (error) {
        console.error('Error deleting order:', error);
      }
    };

    const editTestimonial = (testimonial) => {
      testimonial.isEditing = true; // Aktifkan mode edit
    };

    const cancelEditTestimonial = (testimonial) => {
      Object.assign(testimonial, { isEditing: false }); // Batalkan mode edit
    };

    const saveTestimonial = async function(testimonial) {
  try {
    const response = await axios.put(`/api/testimoni/${testimonial.id}`, testimonial);

    if (response.status === 200) {
      testimonial.isEditing = false;
      this.$emit('testimonialUpdated');
    } else {
      console.error('Unexpected response status:', response.status);
      alert('Failed to update testimonial. Please try again later.');
    }
  } catch (error) {
    console.error('Error updating testimonial:', error.response ? error.response.data : error.message);
    alert('Failed to update testimonial. Please try again later.');
  }
};






    const deleteTestimonial = async (id) => {
      try {
        await api.deleteTestimonial(id);
        emit('testimonialDeleted');
      } catch (error) {
        console.error('Error deleting testimonial:', error);
      }
    };

    const resetOrderForm = () => {
      Object.assign(order, {
        id: null,
        name: '',
        email: '',
        number: '',
        description: '',
        option: '',
        payment_proof: null
      });
    };

    const resetTestimonialForm = () => {
      Object.assign(testimonial, {
        id: null,
        name: '',
        email: '',
        testi: ''
      });
    };

    const fetchOrders = async () => {
      try {
        orders.value = await api.getOrders();
      } catch (error) {
        console.error('Error fetching orders:', error);
      }
    };

    const fetchTestimonials = async () => {
      try {
        testimonials.value = await api.getTestimonials();
      } catch (error) {
        console.error('Error fetching testimonials:', error);
      }
    };

    onMounted(() => {
      fetchOrders();
      fetchTestimonials();
    });

    return {
      order,
      testimonial,
      orders,
      testimonials,
      handleFileUpload,
      submitOrder,
      submitTestimonial,
      editOrder,
      cancelEdit,
      saveOrder,
      deleteOrder,
      editTestimonial,
      cancelEditTestimonial,
      saveTestimonial,
      deleteTestimonial
    };
  }
});
</script>

<style scoped>

</style>
