# ex2021(情報工学特別演習用)

## 本講義の概要

本講義は Project Based Learning (PBL) の一種であり，グループワークによって何らかのシステム開発等を行うという大学院生向けの演習科目である．

情報工学特別演習Iが前期，情報工学特別演習IIが後期の科目であり，グループ分けは 1 年を通じて変更はない．つまり，事実上は通年の科目である．ただし，成績は半期ごとに評価されることになる．

グループ 3 はヒューマンウェア工学研究室所属の 5 名のみとなっているので，指導も同研究室の教員（川原，阿萬）が行う．

## 基本的な進め方

教員（阿萬）がシステム開発の顧客役をやるので，定期的に打合せを行いながら仕様を固めつつ，開発を進めていく．明確な仕様書は用意していないので，そこは打合せを通じてシステムの提案を行ってもらう．そして，主要な部分から順次，開発とテストを行って定期的にリリースしてもらう．

- 受講生は自分たちで日程調整を行い，週に 1 回程度，自分たちの開発ミーティングを行うこと．
- ミーティングでは必ず議事録を残し，このリポジトリに記録すること．
- プログラムや文書はすべてこのリポジトリで管理すること．
- 前後期とも，教員向けに開発報告会を少なくとも 2 回は（中間と期末）設けること．

## Git の使い方メモ

### クローンの仕方
開発に参加する最初のみ行う処理です．  
ファイルを置きたいディレクトリに移動し、以下のコマンドを入力します．  
```bash
git clone https://github.com/minehisa/ex2021.git
```
カレントディレクトリにex2021というフォルダができていれば成功です．

### ファイルの追加の仕方

1.  リポジトリに追加したいファイルまたはフォルダを各自のex2021以下で作成する.
2.  `git add` で追加したいファイル(フォルダ)をインデックスに追加する.
    ```
    $ git add <追加したいファイル(フォルダ)>
    ```

    *この時点ではまだリポジトリに追加されていない.

    現在の状況を確認したい場合は，`git status` で表示される
    + Untracked files ： 追加したファイル  
    + Changes not staged for commit ： インデックスに追加されていない変更したファイル  
    + Changes to be committed ： コミットする予定の変更したファイル  
    にて確認できる．


3.  `git commit` で現在インデックスに登録されている変更内容をリポジトリにコミットする.
    ```
    $ git commit
    ```

    この場合, コミットコメントを記述するためのエディタが開かれる.
    エディタでコミットコメントを入力し, エディタを終了するとコミットが完了する.

    `-m`オプションでコミットコメントを `git commit` 実行時に指定できる.
    ```
    $ git commit -m <コミットコメント>
    ```

4.  `git push` でリポジトリに変更内容をプッシュする.
    ```
    $ git push
    ```


### ファイルの変更の仕方
1.対象のファイルを修正する．修正の仕方は，Gitとは関係なく，自由にやってよい．

2.次のコマンドを実行する．  
```
git add 対象ファイル
```
3.次のコマンドを実行する．
```
git commit
```
<br>...エディタが起動するので作業メモを書いて保存する．
<br>（vi が起動した場合:小文字の i を打つと挿入モードになる．
Escキーを押すと挿入モード終了．
後は，大文字の ZZ で保存と終了になる．）

4.次のコマンドを実行する．  
```
git push
```

### 最新版への更新の仕方
1.次のコマンドを実行する．
```
**git pull**
```
