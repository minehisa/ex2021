<template>
  <div>
    <div class="text-left">
      <a :href="'/paper_add'" class="btn-register">+ 新規登録</a>
    </div>
    <div class="text-left">
      <!-- <a v-on:click="deletePapers" href="" class="btn-delete">- 登録論文削除</a> -->
      <button @click="deletePapers" type="button" class="btn-delete">
        - 登録論文削除
      </button>
    </div>

    <vue-bootstrap4-table
      ref="myvuetable"
      :rows="rows"
      :columns="columns"
      :config="config"
      :actions="actions"
      :classes="classes"
      @on-change-query="onChangeQuery"
      @delete-Papers="deletePapers"
      @refresh-data="onRefreshData"
      @select-labels="selectLabels"
      :show-loader="showLoader"
      :total-rows="total_rows"
    >
      <template slot="sort-asc-icon">
        <i class="fa fa-sort-up">↑</i>
      </template>
      <template slot="sort-desc-icon">
        <i class="fa fa-sort-down">↓</i>
      </template>
      <template slot="no-sort-icon">
        <i class="fa fa-sort">↕️</i>
      </template>
      <template slot="paginataion-previous-button"> Previous </template>
      <template slot="paginataion-next-button"> Next </template>

      <template slot="refresh-button-text"> Refresh </template>
      <template slot="reset-button-text"> Reset </template>
      <template slot="updatetime" slot-scope="props">
        {{ formatDate(props.cell_value) }}
      </template>
      <template slot="regittime" slot-scope="props">
        {{ formatDate(props.cell_value) }}
      </template>
      <template slot="papername" slot-scope="props">
        <a href="#" v-on:click="openLinkInNewTab(props.row)">{{
          props.cell_value
        }}</a>
      </template>
      <template slot="empty-results"> 論文を追加してください． </template>
    </vue-bootstrap4-table>
  </div>
</template>

<script>
import axios from "axios";
import VueBootstrap4Table from "vue-bootstrap4-table";
import moment from "moment";
export default {
  name: "App",
  data: function () {
    return {
      rows: [],

      columns: [
        {
          label: "論文名",
          name: "papername",
          sort: true,
          filter: {
              type: "simple",
              placeholder: "Enter papername"
          },
        },
        {
          label: "著者",
          name: "author",
          visibility: false,
          sort: true,
          filter: {
              type: "simple",
              placeholder: "Enter "
          },
        },
        {
          label: "雑誌名",
          name: "journal",
          visibility: false,
          sort: true,
          filter: {
              type: "simple",
              placeholder: "Enter "
          },
        },
        {
          label: "掲載年",
          name: "yearofpublic",
          visibility: false,
          sort: true,
          filter: {
              type: "simple",
              placeholder: "Enter "
          },
        },
        {
          label: "更新日",
          name: "updatetime",
          sort: true,
          filter: {
            type: "simple",
            placeholder: "Enter updatetime"
          },
        },
        {
          label: "登録日",
          name: "regittime",
          sort: true,
          filter: {
            type: "simple",
            placeholder: "Enter regittime"
          },
        },
      ],
      actions: [
        {
          btn_text: "著者",
          event_name: "select-labels",
          classe: "btn btn-primary",
          event_payload: {
            msg: "author"
          }
        },
        {
          btn_text: "雑誌名",
          event_name: "select-labels",
          classe: "btn btn-primary",
          event_payload: {
            msg: "journal"
          }
        },
        {
          btn_text: "掲載年",
          event_name: "select-labels",
          classe: "btn btn-primary",
          event_payload: {
            msg: "yearofpublic"
          }
        },
      ],
      classes: {
        table: "table-bordered table-striped",
        // tableWrapper: "outer-table-div-class wrapper-class-two",
        // table: {
        //     "table-striped my-class": true,
        //     "table-bordered my-class-two": function(rows) {
        //         return true;
        //     }
        // },
        // row: {
        //     "my-row my-row2": true,
        //     "function-class": function(row) {
        //         return row.id == 1;
        //     }
        // },
        // cell: {
        //     "my-cell my-cell2": true,
        //     "text-danger": function(row, column, cellValue) {
        //         return column.name == "year" && row.year > 50;
        //     }
        // }
      },
      config: {
        rows_selectable: true,
        server_mode: false,
        pagination: true, // default true
        pagination_info: true, // default true
        num_of_visibile_pagination_buttons: 5, // default 5
        per_page: 5, // default 10
        per_page_options: [5, 10, 25,50,100],
        preservePageOnDataChange: false, // default false <- 検索したときにいたページを維持するか/しないか
        checkbox_rows: true,
        card_mode: false,
        highlight_row_hover: true,
        rows_selectable: true,
        multi_column_sort: false,
        selected_rows_info: true,
        loaderText: "更新中...",
      },
      queryParams: {
        sort: [],
        filters: [],
        global_search: "",
        per_page: 10,
        page: 1,
      },
      total_rows: 0,
      showLoader: true,
    };
  },
  methods: {
    onChangeQuery(queryParams) {
      this.queryParams = queryParams;
      this.showLoader = true;
      console.log(this.queryParams);
      this.fetchData();
    },

    fetchData() {
      let self = this;
      axios
        .get("/api/main/papers", {
          params: {
            queryParams: this.queryParams,
          },
        })
        .then(function (response) {
          console.log(response.data.data);
          self.rows = response.data.data;
          self.total_rows = response.data.total;
          self.showLoader = false;
        })
        .catch(function (error) {
          console.log(error);
        });
    },

    onRefreshData() {
      this.fetchData();
    },

    openLinkInNewTab(object) {
      let url = "/paper_detail/" + object.paperid;
      // console.log(url)
      window.open(url, "_blank");
      winopen.opener = null;
      winopen.location = url;
    },

    formatDate(date) {
      return moment(date).utc().format("YYYY/MM/DD HH:mm:SS");
    },

    deletePapers() {
      let self = this;
      let url = "/api/main/delete";
      // console.log(self.$refs.myvuetable.selected_items);
      let items = self.$refs.myvuetable.selected_items;
      let paper_ids = items.map((key) => key.paperid);
      console.log(paper_ids);

      if (paper_ids.length != 0) {
        let result = confirm("削除しますか？");
        if (result) {
          axios
            .post(url, paper_ids)
            .then((res) => {
              self.fetchData();
              self.$refs.myvuetable.unSelectAllItems();
              console.log("削除しました");
            })
            .catch((error) => {
              alert(error);
            });
        } else {
          console.log("削除をとりやめました");
        }
      }
    },

    selectLabels(payload) {
      let label = payload.event_payload.msg.toString();

      let column = this.columns.filter(x => x.name === label);

      // console.log(column);
      for (let key in this.columns) {

        if (this.columns[key].name == label) {
          console.log(this.columns[key]);
          this.columns[key].visibility = !this.columns[key].visibility;
          // console.log(key);
        }
      }
    }


  },
  components: {
    VueBootstrap4Table,
  },
  mounted() {
    this.fetchData();
  },
};
</script>
<style>
.vbt-row-selected {
  /* background-color: rgb(131, 102, 102) !important */
}
.my-margin {
  /* margin: 10px; */
}
</style>
