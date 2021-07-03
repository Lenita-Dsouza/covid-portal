<template>
  <div>
    <section class="text-gray-600 body-font">
      <form @submit.prevent="addPost" class="mb-3">
        <div class="form-group">
          <div>
            <label for="fullname">Full Name</label>
            <input
              id="fullname"
              v-model="post.fullname"
              type="text"
              name="fullname"
            />
          </div>

          <div>
            <label for="age">Age</label>
            <input id="age" v-model="post.age" type="text" name="age" />
          </div>
          <div>
            <label for="adharno">Adhar no</label>
            <input
              id="adharno"
              v-model="post.adharno"
              type="number"
              name="adharno"
            />
          </div>

          <div>
            <label for="dob">date of birth</label>
            <input id="dob" v-model="post.dob" type="date" name="dob" />
          </div>

          <div>
            <label for="address">address </label>
            <input
              id="address"
              v-model="post.address"
              type="text"
              name="address"
            />
          </div>
          <div>
            <label for="vaccinated">vaccinated </label>
            <select id="vaccinated" v-model="post.vaccinated" name="vaccinated">
              <option value="yes">yes</option>
              <option value="no">no</option>
            </select>
          </div>

          <div>
            <label for="dose1date">dose1date </label>
            <input
              id="dose1date"
              v-model="post.dose1date"
              type="date"
              name="dose1date"
            />
          </div>

          <div>
            <label for="dose2date">dose2date </label>
            <input
              id="dose2date"
              v-model="post.dose2date"
              type="date"
              name="dose2date"
            />
          </div>
          <div>
            <label for="result">result </label>
            <select id="result" v-model="post.result" name="result">
              <option value="positive">positive</option>
              <option value="negative">negative</option>
              <option value="recovered">recovered</option>
            </select>
          </div>
          <div>
            <label for="isolation">isolation </label>
            <select id="isolation" v-model="post.isolation" name="isolation">
              <option value="home">home</option>
              <option value="hospital">hospital</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn btn-light btn-block">Save</button>
      </form>
    </section>
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
      article_id: "",
      pagination: {},
      edit: false,
    }
  },
  created() {
    this.fetchPosts();
  },
  methods: {
    fetchPosts() {
      fetch("http://lumen.pro/api/posts")
        .then((res) => res.json())
        .then((res) => {
          // console.log(res.data);
          this.posts = res.data;
        });
    },




    addPost() {
      if (this.edit === false) {
        // Add
        fetch(`http://lumen.pro/api/posts`, {
          method: 'post',
          body: JSON.stringify(this.post),
          headers: {
            "content-type": "application/json",
          },
        })
          .then((res) => res.json())
          .then((data) => {
            this.post.fullname = "";
            this.post.age = "";
            this.post.dob = "";
            this.post.adharno = "";
            this.post.address = "";
            this.post.vaccinated = "";
            this.post.dose1date = "";
            this.post.dose2date = "";
            this.post.result = "";
            this.post.isolation = "";
            // console.log(this.post);
            alert("post Added");
            this.fetchPosts();
          })
          .catch((err) => console.log(err));
      } else {
        // Update
      }
    },
  },
};
</script>