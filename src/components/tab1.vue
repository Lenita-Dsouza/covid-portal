<template>
  <div>
    <section class="text-gray-600 body-font">
      <p class="text-2xl font-bold mb-2 text-gray-800">patient details</p>
      <div v-for="post in posts" v-bind:key="post.id">
        <div class="p-10 bg-blue-100 mb-2">
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-2 text-gray-800">
              ID: {{ post.id }}
            </h2>
            <h2 class="text-2xl font-bold mb-2 text-gray-800">
              Name: {{ post.fullname }}
            </h2>
            <p class="text-gray-700">AGE:{{ post.age }}</p>
            <p class="text-gray-700">dob:{{ post.dob }}</p>
            <p class="text-gray-700">adhar number:{{ post.adharno }}</p>
            <p class="text-gray-700">address:{{ post.address }}</p>
            <p class="text-gray-700">vaccinated:{{ post.vaccinated }}</p>
            <p class="text-gray-700">dose1date:{{ post.dose1date }}</p>
            <p class="text-gray-700">dose2date:{{ post.dose2date }}</p>
            <p class="text-gray-700">result:{{ post.result }}</p>
            <p class="text-gray-700">isolation:{{ post.isolation }}</p>
            <button
              @click="deletePost(post.id)"
              class="
                mt-5
                bg-red-300
                hover:bg-red-900
                text-white
                font-bold
                py-2
                px-4
              "
            >
              Delete Record
            </button>
          </div>
        </div>
      </div>
    </section>
    <!-- <div v-for="post in posts" v-bind:key="post.id"></div> -->
  </div>
</template>
    
<script>
export default {
  data() {
    return {
      posts: [],
      post: {
        fullname: "",
        age: "",
        dob: "",
        adharno: "",
        address: "",
        vaccinated: "",
        dose1date: "",
        dose2date: "",
        result: "",
        isolation: "",
      },
      post_id: "",
      pagination: {},
      edit: false,
    };
  },
  created() {
    this.fetchPosts();
  },

  methods: {
    fetchPosts() {
      fetch("http://lumen.pro/api/posts")
        .then((res) => res.json())
        .then((res) => {
          //console.log(res.data);
          this.posts = res.data;
        });
    },

    deletePost(id) {
      if (confirm('Are You Sure?')) {
        fetch(`http://lumen.pro/api/posts/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('Record Removed');
            this.fetchPosts();
          })
          .catch(err => console.log(err));
      }
    }
  },
};
</script>


