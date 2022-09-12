## アプリケーション概要

Web制作の仕事専門の求人サイト。

## なぜ作成したのか
マルチログイン機能を使用したサイトをイチから実装したいと思ったのがきっかけです。
その中でも求人サイトを作成した理由については、以前に求人サイトの営業をしていた経験があり、管理画面を使用したことがあったので作成のイメージがしやすかったためです。

## 機能一覧

- ユーザー側

<table>
    <tbody>
        <tr>
        <th>一般ユーザー</th>
        <td>求人一覧、求人詳細</td>
        </tr>
        <tr>
        <th>ログインユーザー</th>
        <td>お気に入り機能、応募フォーム（確認画面有り）</td>
        </tr>
        <tr>
        <th>その他</th>
        <td>マルチログイン機能、絞り込み検索、フリーワード検索</td>
        </tr>
    </tbody>
</table>

- 管理者側

<table>
    <tbody>
        <tr>
        <th>求人管理</th>
        <td>一覧、詳細、編集、削除</td>
        </tr>
        <tr>
        <th>企業管理</th>
        <td>一覧、詳細、編集、削除</td>
        </tr>
        <tr>
        <th>企業管理</th>
        <td>一覧、編集、削除</td>
        </tr>
        <tr>
        <th>その他</th>
        <td>マルチログイン機能、フリーワード検索</td>
        </tr>
    </tbody>
</table>

## 使用技術
- Laravel 8
- Laravel Breeze
- Flatpickr
- toastr.js
- MySQL

## その他
開発環境はMAMP、本番環境はさくらサーバーです。
