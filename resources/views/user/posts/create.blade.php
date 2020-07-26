<h1>何かわからないけど、とにかくポストしましょう！</h1>
<h2>Postコントローラーで、Postsに保存されるような処理をやってみましょう</h2>
<h2>５分間くらい悩んでみましょう。過去の資料を見直したり、なんでもありです。</h2>

<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <div>タイトル：<input name="title"></div>
    <div>内容：<input name="content"></div>
    <div><input type="submit" value="送信"></div>
</form>