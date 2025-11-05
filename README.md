# About

A pure-php, file-based discussion forum toy, created from first principles.

Based on an example found in "PHP Programming with MySQL" by Don Gosselin.

Inspired by the great 4chan hack of 2025.

# TODO

- be consistent with search, sort and render, whether in models or utilities
- clearer commentrary
- take opportunities to delete duplicated code
- a general error view to render
- improve the sorter
- move data directory out of server tree
- escape characters are saved in storage, but this is ok if we strip them
  later
- we need to do proper file locking when reading or writing messages/topics!


# Notes

## setting-up

the `data` directory needs to be owned by `www-data` for read-write.

# Sample

<img src="sample.png" alt="example sample of 'discussion' homepage"
title="example sample" />
