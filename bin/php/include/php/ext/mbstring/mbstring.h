/*
   +----------------------------------------------------------------------+
   | Copyright (c) The PHP Group                                          |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | https://www.php.net/license/3_01.txt                                 |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
   | Author: Tsukada Takuya <tsukada@fminn.nagano.nagano.jp>              |
   |         Hironori Sato <satoh@jpnnet.com>                             |
   |         Shigeru Kanemoto <sgk@happysize.co.jp>                       |
   +----------------------------------------------------------------------+
 */

#ifndef _MBSTRING_H
#define _MBSTRING_H

#include "php_version.h"
#define PHP_MBSTRING_VERSION PHP_VERSION

#ifdef PHP_WIN32
#undef MBSTRING_API
#ifdef MBSTRING_EXPORTS
#define MBSTRING_API __declspec(dllexport)
#elif defined(COMPILE_DL_MBSTRING)
#define MBSTRING_API __declspec(dllimport)
#else
#define MBSTRING_API /* nothing special */
#endif
#elif defined(__GNUC__) && __GNUC__ >= 4
#undef MBSTRING_API
#define MBSTRING_API __attribute__((visibility("default")))
#else
#undef MBSTRING_API
#define MBSTRING_API /* nothing special */
#endif

#include "libmbfl/mbfl/mbfilter.h"
#include "SAPI.h"

#define PHP_MBSTRING_API 20021024

extern zend_module_entry mbstring_module_entry;
#define phpext_mbstring_ptr &mbstring_module_entry

PHP_MINIT_FUNCTION(mbstring);
PHP_MSHUTDOWN_FUNCTION(mbstring);
PHP_RINIT_FUNCTION(mbstring);
PHP_RSHUTDOWN_FUNCTION(mbstring);
PHP_MINFO_FUNCTION(mbstring);

MBSTRING_API char *php_mb_safe_strrchr(const char *s, unsigned int c, size_t nbytes, const mbfl_encoding *enc);

MBSTRING_API zend_string *php_mb_convert_encoding_ex(
	const char *input, size_t length,
	const mbfl_encoding *to_encoding, const mbfl_encoding *from_encoding);
MBSTRING_API zend_string *php_mb_convert_encoding(
	const char *input, size_t length, const mbfl_encoding *to_encoding,
	const mbfl_encoding **from_encodings, size_t num_from_encodings);

MBSTRING_API size_t php_mb_mbchar_bytes(const char *s, const mbfl_encoding *enc);

MBSTRING_API size_t php_mb_stripos(bool mode, zend_string *haystack, zend_string *needle, zend_long offset, const mbfl_encoding *enc);
MBSTRING_API bool php_mb_check_encoding(const char *input, size_t length, const mbfl_encoding *encoding);

MBSTRING_API const mbfl_encoding *mb_guess_encoding_for_strings(const unsigned char **strings, size_t *str_lengths, size_t n, const mbfl_encoding **elist, unsigned int elist_size, bool strict, bool order_significant);

ZEND_BEGIN_MODULE_GLOBALS(mbstring)
char *internal_encoding_name;
const mbfl_encoding *internal_encoding;
const mbfl_encoding *current_internal_encoding;
const mbfl_encoding *http_output_encoding;
const mbfl_encoding *current_http_output_encoding;
const mbfl_encoding *http_input_identify;
const mbfl_encoding *http_input_identify_get;
const mbfl_encoding *http_input_identify_post;
const mbfl_encoding *http_input_identify_cookie;
const mbfl_encoding *http_input_identify_string;
const mbfl_encoding **http_input_list;
size_t http_input_list_size;
const mbfl_encoding **detect_order_list;
size_t detect_order_list_size;
const mbfl_encoding **current_detect_order_list;
size_t current_detect_order_list_size;
enum mbfl_no_encoding *default_detect_order_list;
size_t default_detect_order_list_size;
HashTable *all_encodings_list;
int filter_illegal_mode;
uint32_t filter_illegal_substchar;
int current_filter_illegal_mode;
uint32_t current_filter_illegal_substchar;
enum mbfl_no_language language;
bool encoding_translation;
bool strict_detection;
size_t illegalchars;
bool outconv_enabled;
unsigned int outconv_state;
void *http_output_conv_mimetypes;
#ifdef HAVE_MBREGEX
struct _zend_mb_regex_globals *mb_regex_globals;
zend_long regex_stack_limit;
#endif
zend_string *last_used_encoding_name;
const mbfl_encoding *last_used_encoding;
/* Whether an explicit internal_encoding / http_output / http_input encoding was set. */
bool internal_encoding_set;
bool http_output_set;
bool http_input_set;
#ifdef HAVE_MBREGEX
zend_long regex_retry_limit;
#endif
ZEND_END_MODULE_GLOBALS(mbstring)

#define MBSTRG(v) ZEND_MODULE_GLOBALS_ACCESSOR(mbstring, v)

#if defined(ZTS) && defined(COMPILE_DL_MBSTRING)
ZEND_TSRMLS_CACHE_EXTERN()
#endif

#endif /* _MBSTRING_H */
