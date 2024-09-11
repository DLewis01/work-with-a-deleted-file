#!/bin/bash

# Create an anonymous file
temp_file=$(mktemp)

# Write some content to the file
echo "Hello, world!" > "$temp_file"

# Print the contents of the file
cat "$temp_file"

# Unlink (delete) the file without closing it
exec 3< "$temp_file"
rm "$temp_file"

# Continue using the unlinked file through its file descriptor
echo "Still using the unlinked file..."
cat <&3

# Cleanup: Close the file descriptor
exec 3<&-
