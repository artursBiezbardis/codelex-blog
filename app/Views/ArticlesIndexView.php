<?php if (isset($_SESSION['auth_id'])): ?>
    <form method="post" action="/logout">
        <button type="submit">Logout</button>
    </form>
<?php elseif (empty($_SESSION['auth_id'])): ?>
    <form method="get" action="/login">
        <button type="submit">Login</button>
    </form>
<?php endif; ?>
<form method="get" action="/add">
    <button type="submit">Add Article</button>
</form>

<h1>Articles</h1>

<?php foreach ($articles as $article): ?>
    <h3>
        <a href="/articles/<?php echo $article->id(); ?>">
            <?php echo $article->title(); ?>
        </a>
    </h3>
    <form method="post" action="/articles/<?php echo $article->id(); ?>">
        <input type="hidden" name="_method" value="DELETE"/>
        <button type="submit" onclick="return confirm('Are you sure?');">Delete</button>
    </form>
    <p><?php echo $article->content(); ?></p>
    <p>
        <small>
            <?php echo $article->createdAt(); ?>
        </small>
    </p>
<?php endforeach; ?>
