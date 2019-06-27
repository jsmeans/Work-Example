<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( 15 ), 'single-post-thumbnail' ); ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": 
  [
    {
      "@type": "ListItem",
      "position": 1,
      "item": 
      {
        "@id": "https://beyondtheory.us/our-work/",
        "name": "Projects",
        "image": "<?php echo $image[0] ?>"
      }
    },
    {
      "@type": "ListItem",
      "position": 2,
      "item": 
      {
        "@id": "<?php the_permalink(); ?>",
        "name": "<?php the_title(); ?>",
        "image": "<?php the_post_thumbnail_url(); ?>"
      }
    }
  ]
}
</script>