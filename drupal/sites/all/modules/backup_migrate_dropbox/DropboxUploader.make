; $Id$
;
; Dropbox Uploader makefile
; ----------------
; This makefile downloads the lastest version from Dropbox Uploader and 
; places it sites/all/libraries/DropboxUploader.

core = 6.x
api = 2

libraries[DropboxUploader][download][type] = "get"
libraries[DropboxUploader][download][url] = "http://jaka.kubje.org/projects/dropbox-uploader/files/dropboxuploader-115.zip"
libraries[DropboxUploader][directory_name] = "DropboxUploader"
libraries[DropboxUploader][destination] = "libraries"