<div class="search-section">
    <form
        aria-label="search form"
        action="<?php echo BASE_URL."search.php" ?>"
        method="get">
        <input 
            type="text"
            aria-label="text input"
            id="search"
            name="query"
            placeholder="Search..." 
            required>
        <input type="submit"
        aria-label="go search"
        value="Go"
        title="search">
    </form>
</div>
