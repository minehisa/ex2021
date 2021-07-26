<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>論文名</th>
              <th>ユーザーID</th>
              <th>最終更新日</th>
              <th>登録日時</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="paper in papers">
              <td>{{ $index }}</td>
              <td>{{ paper.paperid }}</td>
              <td>{{ paper.updatetime }}</td>
              <td>{{ paper.regittime }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>


<script>
import api from "../api.js";
export default {
  data() {
    return {
      active_paper: null,
      paper_form: "",
      papers: [],
    };
  },
  methods: {
    addpaper() {
      let data = { paper: this.paper_form };
      data._token = document.getElementsByName("csrf-token")[0].content;
      api.postPaper(JSON.stringify(data)).then(() => {
        this.getPaperList();
      });
    },
    deletePaper(id) {
      let data = {};
      data._token = document.getElementsByName("csrf-token")[0].content;
      api.deletePaper(id, JSON.stringify(data)).then(() => {
        this.getPaperList();
      });
    },
    updatePaper(id) {
      let data = {
        paper: this.papers.filter((v) => {
          return v.id === id;
        })[0].paper,
      };
      data._token = document.getElementsByName("csrf-token")[0].content;
      api.updatePaper(id, JSON.stringify(data)).then(() => {
        this.getPaperList();
      });
    },
    getPaperList() {
      api.getPaperList().then((result) => {
        this.papers = result;
      });
    },
  },
  mounted() {
    this.getPaperList();
    console.log("Component mounted.");
  },
};
</script>
