<template>
    <vue-bootstrap4-table
        :rows="rows"
        :columns="columns"
        :config="config"
        :actions="actions"
        @on-change-query="onChangeQuery"
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
        <template slot="paginataion-previous-button">
            Previous
        </template>
        <template slot="paginataion-next-button">
            Next
        </template>

        <template slot="refresh-button-text">
            Refresh
        </template>
        <template slot="reset-button-text">
            Reset
        </template>
        <templete slot="papername" slot-scope="props">
            <a href="#" v-on:click="openLinkInNewTab(props.row)">{{props.cell_value}}</a>
        </templete>
        <templete slot="empty-results">
            論文を追加してください．
        </templete>

    </vue-bootstrap4-table>
</template>

<script>
import axios from "axios";
import VueBootstrap4Table from "vue-bootstrap4-table";
export default {
    name: "App",
    data: function() {
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
                    }
                },
                {
                    label: "更新日",
                    name: "updatetime",
                    sort: true,
                    filter: {
                        type: "simple",
                        placeholder: "Enter updatetime"
                    }
                },
                {
                    label: "登録日",
                    name: "regittime",
                    sort: true,
                    filter: {
                        type: "simple",
                        placeholder: "Enter regittime"
                    }
                }
            ],
            actions: [],

            classes: {
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
                pagination_info: false, // default true
                num_of_visibile_pagination_buttons: 5, // default 5
                per_page: 5, // default 10
                per_page_options: [5, 10, 25, 50, 100],
                preservePageOnDataChange: false, // default false <- 検索したときにいたページを維持するか/しないか
                checkbox_rows: true,
                card_mode: false,
                highlight_row_hover: true,
                rows_selectable: true,
                multi_column_sort: false,
                selected_rows_info:true
            },
            queryParams: {
                sort: [],
                filters: [],
                global_search: "",
                per_page: 10,
                page: 1
            },
            total_rows: 0
        };
    },
    methods: {
        onChangeQuery(queryParams) {
            this.queryParams = queryParams;
            console.log(this.queryParams);
            this.fetchData();
        },

        fetchData() {
            let self = this;
            axios
                .get('/api/main/papers', {
                    params: {
                        queryParams: this.queryParams
                    }
                })
                .then(function(response) {
                    console.log(response.data.data);
                    self.rows = response.data.data;
                    self.total_rows = response.data.total;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },

        openLinkInNewTab (object) {
            let url = '/paper_detail/' + object.paperid;
            // console.log(url)
            window.open(url, '_blank')
        }
    },
    components: {
        VueBootstrap4Table
    },
    mounted() {
        this.fetchData();
    }
};
</script>
<style></style>
