# Handmade Palette

## 環境構築

### Dockerビルド
1. `git@github.com:manami0630/handmade-palette.git`
2. `docker-compose up -d --build`

* MySQLは、OSによって起動しない場合があるので、それぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

### Laravel環境構築
1. `docker-compose exec php bash`
2. `composer install`
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`
7. `php artisan storage:link`

* .envに以下の値を入力してください。
   - MAIL_FROM_ADDRESS=例: your-email@example.com

## ダミーデータ概要
初期データは `php artisan db:seed` 実行時に登録されます。以下は主なダミーデータの内容です。

### ユーザー（users）
| 名前 | メールアドレス | パスワード |
|------|----------------|------------|
| 佐藤太郎 | satou@example.com | password123 |

※ パスワードはすべて `bcrypt()` でハッシュ化されています。

### 作品（products）
| 出品者 | 作品名 | 写真URL | カテゴリー | 説明 |
|--------|--------|------|------|------------|
| 佐藤太郎 | 苺のバスケット | ![IMG_1395](https://github.com/user-attachments/assets/32bc1814-b498-4fb0-945b-5cd70bb641b0) | エコクラフト | 苺好きの心をくすぐる、かわいさ満点のバスケット。|
| 佐藤太郎 | ぶどうのタペストリー | ![IMG_1402](https://github.com/user-attachments/assets/1ec4ea21-996c-49fb-a0c9-43eff6a253c6) | エコクラフト | 実の季節を感じさせる、ぶどうのタペストリー。|
| 佐藤太郎 | ぶどうの編みぐるみ | ![IMG_1414](https://github.com/user-attachments/assets/5e1c800b-5831-40a2-aec7-3906bd7dd7b9) | 編み物 | ふっくら可愛い、毛糸のぶどう編みぐるみ。|
| 佐藤太郎 | 消防車 | ![IMG_1871](https://github.com/user-attachments/assets/65a7de2a-41fa-461f-8248-9489b53d49e8) | エコクラフト | 赤い車体やはしご、ホースなど、消防車ならではの力強いシルエットをそのまま表現。|
| 佐藤太郎 | しめ縄 | ![IMG_1929](https://github.com/user-attachments/assets/cc14ee52-1128-4bc3-aa8c-84cc737fd861) | エコクラフト | 新年を迎える空間を清らかに整える、しめ縄飾り。|
| 佐藤太郎 | 干支 巳 | ![IMG_1951](https://github.com/user-attachments/assets/ae6e2d52-c77f-437c-9a78-4d6e4b27ce0f) | エコクラフト | お正月飾りには欠かせない、十二支の仲間です。|
| 佐藤太郎 | だるま | ![IMG_1960](https://github.com/user-attachments/assets/24c79f0e-fbe1-45f5-a092-14be6a28f9cf) | エコクラフト | みんなの幸運を願う縁起物です。合格祈願などの励ましにぴったりなダルマさん。|
| 佐藤太郎 | チンアナゴ | ![IMG_1963](https://github.com/user-attachments/assets/59be4ec2-0c48-4e21-8e6e-07bd3241291d) | エコクラフト | ひょっこり顔を出す姿が愛らしい、チンアナゴクラフト。|
| 佐藤太郎 | マスカットのピアス | ![IMG_2407](https://github.com/user-attachments/assets/e9595b7e-f580-4dff-a5ad-1924db88139b) | レジン | みずみずしさを耳元に添える、マスカットのピアス。|
| 佐藤太郎 | 干支 午 | ![IMG_2485](https://github.com/user-attachments/assets/ac5b81ca-03db-46b1-902d-db97cf6f47c3) | エコクラフト | お正月飾りには欠かせない、十二支の仲間です。|
| 佐藤太郎 | クリスマスリース | ![IMG_2543](https://github.com/user-attachments/assets/cf5630f3-c895-47f2-abb4-d846fcd543e8) | エコクラフト | 季節の訪れを華やかに告げる、クリスマスリース。|
| 佐藤太郎 | クリスマスリース | ![IMG_2550](https://github.com/user-attachments/assets/66de7fb4-5b86-4b1c-bb20-a55d3a9e1c58) | エコクラフト | 季節の訪れを華やかに告げる、クリスマスリース。|
| 佐藤太郎 | クリスマスリース | ![IMG_2578](https://github.com/user-attachments/assets/6ba8c7c8-c7ff-4c87-999f-71af10fe9bd7) | エコクラフト | 季節の訪れを華やかに告げる、クリスマスリース。|
| 佐藤太郎 | 柴犬（茶）のリース | ![IMG_2591](https://github.com/user-attachments/assets/a8e75e6c-3df0-4614-a5aa-8d1e2097c1c7) | エコクラフト | 優しい表情の柴犬が迎えてくれる、花飾りのリース。|
| 佐藤太郎 | 正月リース | ![IMG_2594](https://github.com/user-attachments/assets/c4ef1018-7c9e-4f9e-8058-116edb017c10) | エコクラフト | 新年の福を呼び込む、正月リース。|
| 佐藤太郎 | カエルの親子 | ![IMG_2595](https://github.com/user-attachments/assets/c18bfc14-3686-4f0d-b49b-0ecf4837dc00) | エコクラフト | みんなの幸運を願う縁起物です。「無事に帰る」の交通安全！|
| 佐藤太郎 | 椿の羽子板 | ![IMG_2618](https://github.com/user-attachments/assets/ba3cada7-609e-459e-95b0-ebd0a03cee9c) | エコクラフト | 気品のある椿が彩る、華やかな羽子板飾り。|
| 佐藤太郎 | 七福神の羽子板 | ![IMG_2619](https://github.com/user-attachments/assets/3da8db34-450e-418d-a86f-d6872e82892b) | エコクラフト | 福を集めて一年を照らす、七福神の羽子板飾り。|
| 佐藤太郎 | 春うさぎのかご娘 | ![667](https://github.com/user-attachments/assets/9edf68b0-482b-4ef7-90dc-ac59c0f65ee1) | 粘土 | 春の訪れを告げるような、ふんわり優しい雰囲気の粘土細工の女の子。|

---

## 使用技術
- PHP 8.5.0
- Laravel 8.83.8
- MySQL 8.0.44

## ER図
<img width="885" height="711" alt="スクリーンショット 2026-01-15 002033" src="https://github.com/user-attachments/assets/1b8e5c54-9f93-4172-82f7-0cdf6b7b5a07" />

## URL
- 開発環境: [http://localhost:8081](http://localhost:8081)
- phpMyAdmin: [http://localhost:8080/](http://localhost:8080/)
- mailhog:  [http://localhost:8025/](http://localhost:8025/)
