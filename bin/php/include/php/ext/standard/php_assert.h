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
   | Author: Thies C. Arntzen <thies@thieso.net>                          |
   +----------------------------------------------------------------------+
*/

#ifndef PHP_ASSERT_H
#define PHP_ASSERT_H

PHP_MINIT_FUNCTION(assert);
PHP_MSHUTDOWN_FUNCTION(assert);
PHP_RINIT_FUNCTION(assert);
PHP_RSHUTDOWN_FUNCTION(assert);
PHP_MINFO_FUNCTION(assert);

enum
{
   PHP_ASSERT_ACTIVE = 1,
   PHP_ASSERT_CALLBACK,
   PHP_ASSERT_BAIL,
   PHP_ASSERT_WARNING,
   PHP_ASSERT_EXCEPTION
};

extern PHPAPI zend_class_entry *assertion_error_ce;

#endif /* PHP_ASSERT_H */
