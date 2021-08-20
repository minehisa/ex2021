<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">論文リスト</div>
                    <div class="card-body">
                        <table class="table" v-if="papers" border="1" style="border-collapse: collapse">
                            <thead>
                                <th bgcolor="#cccccc">
                                    <input type="checkbox" v-model="AllChecked" value="1" v-on:click="clickAllChecked($event)">
                                </th>
                                <th bgcolor="#cccccc">論文名</th>
                                <th bgcolor="#cccccc">最終更新日</th>
                                <th bgcolor="#cccccc">登録日時</th>
                            </thead>
                            <tbody v-for="paper in papers" :key='paper.paperid'>
                                <td><input type='checkbox' class="chk" value="paper.id" v-on:click="clickChecked($event)"></td>
                                <td>{{ paper.papername }}</td>
                                <td>{{ paper.updatetime }}</td>
                                <td>{{ paper.regittime }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data : function(){
            return {
                papers: null,
            };
        },
        mounted () {
            axios
                .get('/api/main/papers')    // タスク取得用の内部APIをここで呼び出し
                .then((response) => {
                    this.papers = response.data;
                })
                .catch(function (error) {
                    alert('通信に失敗しました');
                    console.log(error);
                })
        },
        methods: {
            clickAllChecked: function (event) {
                var CHK = document.getElementsByClassName('chk');
                var actionFlg;
                // 全体用のチェックボックスの状態を判断して行のチェックボックスに設定するフラグを格納する
                if (event.target.checked == true) {
                actionFlg = true;
                } else {
                actionFlg = false;
                }
                // 行のチェックボックスにチェックの付けたり外したりする
                for (var i = 0; CHK.length > i; i++) {
                CHK[i].checked = actionFlg;
                }
            },
            clickChecked: function(event) {
                // 全体用のチェックボックスがtrueの時に、行のチェックが一つでもfalseになったら全体チェックもfalseにする
                if(event.target.checked == false){
                this.AllChecked = 0;
                }
            }
        }
    }

</script>
