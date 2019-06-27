<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": {
    "@type": "ListItem",
    "position": 1,
    "item": {
      "@id": "<?php the_permalink(); ?>",
      "name": "<?php the_title(); ?>",
      "image": "<?php the_post_thumbnail_url(); ?>"
    }
  }
}
</script>