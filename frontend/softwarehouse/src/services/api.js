import axios from 'axios';

// Konfigurasi Axios
const apiClient = axios.create({
  baseURL: 'http://localhost:8000/api', // URL backend Laravel
  headers: {
    'Accept': 'application/json',
  },
});



// Orders API
const getOrders = async () => {
  const response = await apiClient.get('/orders');
  return response.data;
};

const addOrder = async (order) => {
  return await apiClient.post('/orders', order);
};

const updateOrder = async (id, order) => {
  return await apiClient.put(`/orders/${id}`, order);
};

const deleteOrder = async (id) => {
  return await apiClient.delete(`/orders/${id}`);
};

// Testimonials API
const getTestimonials = async () => {
  const response = await apiClient.get('/testimoni');
  return response.data;
};

const addTestimonial = async (testimonial) => {
  return await apiClient.post('/testimoni', testimonial);
};

// const updateTestimonial = async (id, testimonial) => {
//   return await apiClient.put(`/testimoni/${id}`, testimonial);
// };

const updateTestimonial = async (testimonial) => {
  return await apiClient.put(`/testimoni/${testimonial.id}`, testimonial);
};


const deleteTestimonial = async (id) => {
  return await apiClient.delete(`/testimoni/${id}`);
};

export default {
  getOrders,
  addOrder,
  updateOrder,
  deleteOrder,
  getTestimonials,
  addTestimonial,
  updateTestimonial,
  deleteTestimonial,
};
