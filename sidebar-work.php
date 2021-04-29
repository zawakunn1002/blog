<aside class="p-archive__sidebar">
  <h2 class="o-title is-side">
    <span class="font_yumin">TAG</span>
    <span>タグ</span>
  </h2>
  <div class="p-archive__sidebar__tag">
    <?php
      $terms = get_terms('workstag');
      foreach ($terms as $term)
      {echo '<span>'.($term->name).'</span>';}
    ?>
  </div>
</aside>