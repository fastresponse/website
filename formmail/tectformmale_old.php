<?php
$FM_VERS = "7.12";		// script version

/* ex:set ts=4 sw=4:
 * FormMail PHP script.  This script requires PHP 4 or later.
 * Copyright (c) 2001-2006 Root Software and Open Concepts Pty Ltd.
 * All rights reserved.
 *
 * Visit us at http://www.tectite.com/
 * for updates and more information.
 *
 **** If you use this FormMail, please support its development and other
 **** freeware products by putting the following link on your website:
 ****	Visit www.tectite.com for free <a href="http://www.tectite.com/">FormMail</a>.
 *
 * Author: Russell Robinson, 2nd October 2001
 * Last Modified: RR 12:30 Wed 11 October 2006
 * QVCS Version: $Revision: 1.112 $
 *
 * Read This First
 * ~~~~~~~~~~~~~~~
 *	This script is very heavily documented!  It looks daunting, but
 *	really isn't.
 *	If you have experience with PHP or other scripting languages,
 *	here's what you *need* to read:
 *		- Features
 *		- Configuration (TARGET_EMAIL & DEF_ALERT)
 *		- Creating Forms
 *	That's it!  (Alternatively, just read the Quick Start section below).
 *
 * Quick Start
 * ~~~~~~~~~~~
 *	1. Edit this file and set TARGET_EMAIL for your requirements (approx
 *		line 2958 in this file - replace "yourhost\.com" with your mail server's
 *		name).  We also strongly recommend you set DEF_ALERT (the next
 *		configuration below TARGET_EMAIL).
 *	2. Install this file as formmail.php on your web server
 *	3. Create an HTML form and:
 *		- specify a hidden field called "recipients" with the email address
 *		  of the person to receive the form's results.
 *		- specify method "post" (or "get") and an action set to
 *		  the formmail.php you uploaded to your web server
 *
 *	Once you have FormMail working, you may be interested in some advanced
 *	usage and features.  We have HOW-TO guides at www.tectite.com which
 *	describe many of the advanced processing you can do with FormMail.
 *
 * Purpose:
 * ~~~~~~~~
 *	To accept HTTP POST information from a form and mail it to recipients.
 *	This version can also supply data to a TectiteCRM document, usually
 *	for insertion into the CRM database.
 *
 * What does this PHP script do?
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *	On your web site, you may have one or more HTML forms that accept
 *	information from people visiting your website.  Your aim is for your
 *	website to email that information to you and/or add it to a database.
 *	formmail.php performs those functions.
 *
 * Features
 * ~~~~~~~~
 *		-	Optionally sends email of form results to recipients that
 *			can be specified in the form itself.
 *		-	Optionally stores the form results in a CSV (comma-separated-
 *			values) file on your server.
 *		-	Optionally logs form activity.
 *		-	Optionally sends form results to a TectiteCRM document; generally,
 *			to automatically update the CRM database.
 *		-	Recipient email addresses can be mangled in your forms to
 *			protect them from spambots.
 *		-	Emails can be processed through any program (typically an
 *			encryption program) before sending.
 *		-	Successful processing can redirect the user to any URL.
 *			For example, for downloads, we redirect the user to the file
 *			they want to download.
 *		-	Supports any number of recipients.  For security, recipient
 *			domains must be specified inside the script (see "Configuration"
 *			for details).
 *		-	Failed processing can redirect to a custom URL.
 *		-	Failed processing can be reported to a specific email address.
 *		-	Supports both GET and POST methods of form submission.
 *		-	Supports file uploads (multiple files can be uploaded).
 *		-	Supports checkboxes and multiple-selection lists.
 *		-	Supports CC and BCC addresses.
 *		-	Supports deriving fields by concatenating other fields.
 *		-	Supports exclusion of fields (in email)
 *		-	Supports HTML emails via a template feature.
 *		-	Supports complex field validation mechanisms.
 *		-	Supports advanced user error handling features (including using our
 *			free fmbadhandler.php script).
 *		-	Supports error and success template display.
 *		-	Provides most of the features of other formmail scripts.
 *
 * Security
 * ~~~~~~~~
 *	Security is the primary concern in accepting data from your website visitors.
 *	formmail.php has several security features designed into it.  Note, however,
 *	it requires configuration for your particular web site.
 *
 * Configuration
 * ~~~~~~~~~~~~~
 *	For instructions on configuring this program, go to the section
 *	titled "CONFIGURATION" (after reading the legal stuff below).
 *	There is only one mandatory setting: TARGET_EMAIL
 *
 * Creating Forms
 * ~~~~~~~~~~~~~~
 *	This section explains how to call formmail.php from your HTML
 *	forms.  You already need to know how to create an HTML form, but
 *	this section will tell you how to link it with this formmail script.
 *
 *	Your form communicates its requirements to formmail.php through
 *	a set of "hidden" fields (using <INPUT TYPE="HIDDEN"...>).  The data to
 *	be processed by formmail (e.g. the actual email to send) comes from
 *	a combination of hidden fields and other form fields (i.e. data entry
 *	fields from the user).
 *
 *	Here are the steps to use formmail.php with your HTML form:
 *		1. Create your HTML form using standard HTML
 *		2. Ensure your form has the following fields defined.  These are
 *		   fields you expect the user to fill in:
 *				email		the user's email address
 *				realname	the real name of the user
 *		3. Add the following hidden fields to your form.  Note that all
 *		   are optional:
 *				recipients	a comma-separated list of email addresses that
 *							the form results will be sent to.  These must
 *							be valid according to the "TARGET_EMAIL" configuration.
 *							Example:
 *								russ.robbo@rootsoftware.com,sales@rootsoftware.com.au
 *				alert_to	email address to send errors/alerts to
 *							Example:
 *								webmaster@rootsoftware.com
 *				required	a list of fields the user must provide, together
 *							with a friendly name.  The field list is separated
 *							by commas, and you append the friendly name to
 *							the field name with a ':'.
 *							Example:
 *								email:Your email address,realname:Your name,Country,Reason:The reason you're interested in our product
 *							Note that field names and friendly names must not
 *							contain any of these characters:
 *									:|^!=,
 *							Advanced usage allows you to do the following:
 *								field1:name1|field2:name2
 *									either field1 or field2 is required
 *									(both allowed, too)
 *								field1:name1^field2:name2
 *									either field1 or field2 is required
 *									(both not allowed)
 *								field1:name1=field2:name2
 *									field1's value must be the same as
 *									field2's value
 *								field1:name1!=field2:name2
 *									field1's value must be different from
 *									field2's value
 *							In all the above ":name" is optional for any field.
 *
 *				conditions	a list of complex conditions, all of which must
 *							evaluate to true.  Conditions are a more powerful
 *							alternative to the "required" specification.
 *							The list of conditions is separated by a character
 *							you specify by the first character in the list.  You
 *							specify the internal conditions component separator
 *							as the second character in the list, as follows:
 *								name="conditions" value=":@condition1:condition2
 * 															:condition3"
 *							specifies that the conditions are separated by the
 *							asterisk character.
 *							There are size limitations to fields, so you
 *							can specifie any number of conditions fields like
 *							this:
 *								name="conditions1" value=":@condition1:condition2
 * 															:condition3"
 *								name="conditions2" value=":@condition4:condition5
 * 															:condition6"
 *
 *							A condition has this general format (spaces
 *							optional):
 *								COMMAND@ test1 @test2 @... @MESSAGE@
 *							COMMAND and MESSAGE are mandatory.  MESSAGE is
 *							the message to display to the user if the condition
 *							fails.
 *							"@" is the internal separator that you specified
 *							as the second character of the conditions list.
 *							The tests are field comparisons, and have this
 *							general format:
 *								field1 OP field2
 *
 *							OP is an operand.  Tests are similar to the "required"
 *							specification, but the friendly field names are not
 *							allowed because you can provide a general message.
 *
 *								field1
 *									field1 must have a value
 *								field1&field2
 *									both field1 and field2 must have a value
 *								field1|field2
 *									either field1 or field2 must have a value
 *									(both allowed, too)
 *								field1^field2
 *									either field1 or field2 must have a value
 *									(both not allowed)
 *								field1=field2
 *									field1's value must be the same as
 *									field2's value
 *								field1!=field2
 *									field1's value must be different from
 *									field2's value
 *								field1~pattern
 *									field1's value must match the specified
 *									perl regular expression
 *								field1!~pattern
 *									field1's value must not match the specified
 *									perl regular expression
 *								field1#=number
 *									field1's value is interpreted as a number
 *									and must equal the given number
 *								field1#!=number
 *									field1's value is interpreted as a number
 *									and must be not equal to the given number
 *								field1#<number
 *									field1's value is interpreted as a number
 *									and must be less than the given number
 *								field1#>number
 *									field1's value is interpreted as a number
 *									and must be greater than the given number
 *								field1#<=number
 *									field1's value is interpreted as a number
 *									and must be less than or equal to the given number
 *								field1#>=number
 *									field1's value is interpreted as a number
 *									and must be greater than or equal to the given number
 *								!
 *									the test evaluates to "false".
 *								an empty test evaluates to "true".
 *
 *							The conditions are:
 *								@TEST@test@message@
 *									the test must be true.  If not, the
 *									given message is shown.
 *									Example:
 *										@TEST@realname@Please provide your name so
 *										that we can address you properly.@
 *								This is exactly the same as a "required"
 *								specification except that you can provide
 *								an arbitrary message.
 *
 *								@IF@test1@test2@test3@message@
 *									if test1 is true then test2
 *									must be true.  If test1 is false then
 *									test3 must be true.
 *									Examples:
 *										@IF@salutation~/usefirst/@firstname@lastname@You
 *											must provide your first name if you
 *											want us to use it to address you or
 *											your last name for Mr., Mrs., etc.@
 *										says that firstname is required
 *										if salutation has the value "usefirst",
 *										and lastname is required otherwise.
 *										On failure, the given message is shown.
 *
 *										@IF@payment~/ccard/@creditcard~/[1-9][0-9]{12,15}/@@You must
 *											enter your credit card number to
 *											pay by credit card.@
 *										says that if the payment value is "ccard"
 *										then the creditcard field must contain
 *										at least one digit.
 *
 *				mail_options a list of options to control FormMail when
 *							sending email
 *				derive_fields a mechanism for deriving form fields by
 *							concatenating other form fields
 *							Example:
 *								realname=firstname+lastname,fullphone=area.phone,address=street*suburb
 *							Operators are:
 *								+		concatenate with a single space between,
 *										but skip the space if the next field is
 *										empty
 *								.		concatenate with no space between
 *								*		concatenate with a single space between
 *              file_names  a mechanism for naming the files uploaded by the
 *                          form.  By default the files will be named with
 *                          user's original file name.  This feature allows you
 *                          to provide different names.
 *                          The same features are available as for derive_fields.
 *                          Example:
 *                              file1=order_id.%'-1'%,file2=order_id.%'-2'%
 *				good_url	the URL to redirect to on successful processing
 *				bad_url		the URL to redirect to on failed processing
 *				this_form	the URL of the form that's submitting the data;
 *							used with intelligent bad_url processing
 *				good_template a template file that FormMail can display on
 *							successful processing
 *				bad_template a template file that FormMail can display on
 *							failed processing
 *				template_list_sep a string to use when expanding lists
 *							of values in templates.  The default is comma.
 *				subject		a subject line for the email that's sent to your
 *							recipients
 *							Example:
 *								Form Submission
 *				env_report	a comma-separated list of environment variables
 *							you want included in the email
 *							Example:
 *								REMOTE_HOST,REMOTE_ADDR,HTTP_USER_AGENT,AUTH_TYPE,REMOTE_USER
 *				filter		name of a filter to process the email before sending.
 *							You can encode or encrypt the email, for example.
 *				filter_options comma-separated list of options to control the filter.
 *				filter_fields comma-separated list of fields to filter.
 *							The behaviour of this specification can vary slightly
 *							depending on your other specifications.  Refer
 *							to our How-To guide on Filtering for more information.
 *				logfile		name of a file to append activity to.  Note that
 *							you must configure "LOGDIR" for this to work.
 *							Example:
 *								formmail.log
 *				csvfile		name of the CSV database to append results to. Note that
 *							you must configure "CSVDIR" for this to work. You
 *							must also specify the csvcolumns field.
 *							Example:
 *								formmail.csv
 *				csvcolumns	comma-separated list of field names you want to
 *							store in the CSV database.  These are the field
 *							names in your form, and the order specifies the
 *							order for storage in the CSV database.
 *							Example:
 *								email,realname,Country,Reason
 *				autorespond	comma-spearated list of specifications for the
 *							Auto Repsonder feature.  Specifications are:
 *								Subject		set to the subject line you
 *											want in the email sent to the user
 *								HTMLTemplate set to the name of the template
 *											to use for sending HTML email to
 *											the user
 *								PlainTemplate set to the name of the template
 *											to use for sending plain text email
 *											to the user
 *								TemplateMissing set to the string to use to
 *											fill in unsubmitted fields in template
 *							You can specify either HTMLTemplate or PlainTemplate
 *							or both.
 *							Example:
 *								Subject=Thanks for your purchase,HTMLTemplate=orderemail.htm
 *				crm_url		a URL to send the form data to.  This is for use
 *							with the TectiteCRM system.
 *				crm_spec	a specification to pass to TectiteCRM.  Please
 *							read the TectiteCRM documentation for details of
 *							how to use this field.
 *				crm_options options to control processing of TectiteCRM
 *							interface
 *
 *		4. Check that you've provided at least one of these fields:
 *				recipients, or
 *				logfile, or
 *				csvfile and csvcolumns, or
 *				crm_url and crm_spec
 *		   If you don't specify any of these, then formmail.php will fail
 *		   because you've given it no work to do!
 *
 *	Note that we've provided a sample HTML form to get you started.
 *	Look for "Sample HTML Form Using FormMail" on our forums at
 *	http://www.tectite.com/.
 *
 *	Note also that the default success and failure pages shown by formmail.php
 *	are quite basic.  We recommend that you provide your own pages
 *	with "good_url" and "bad_url".
 *
 * Copying and Use
 * ~~~~~~~~~~~~~~~
 *	formmail.php is provided free of charge and may be freely distributed
 *	and used provided that you:
 *		1. keep this header, including copyright and comments,
 *		   in place and unmodified; and,
 *		2. do not charge a fee for distributing it, without an agreement
 *		   in writing with Root Software allowing you to do so; and,
 *		3. if you modify formmail.php before distributing it, you clearly
 *		   identify:
 *				a) who you are
 *				b) how to contact you
 *				c) what changes you have made
 *				d) why you have made those changes.
 *
 * Warranty and Disclaimer
 * ~~~~~~~~~~~~~~~~~~~~~~~
 *	formmail.php is provided free-of-charge and with ABSOLUTELY NO WARRANTY.
 *	It has not been verified for use in critical applications, including,
 *	but not limited to, medicine, defense, aircraft, space exploration,
 *	or any other potentially dangerous activity.
 *
 *	By using formmail.php you agree to indemnify Root Software and
 *  Open Concepts Pty Ltd, their agents, employees, directors and
 *  associated companies and businesses from any liability whatsoever.
 *
 * We still care
 * ~~~~~~~~~~~~~
 *	If you find a bug or fault in FormMail, please report it to us.
 *  We will respond to your report and make endeavours to rectify any
 *  faults you've detected as soon as possible.
 *	To contact us, visit http://www.tectite.com/contacts.php.
 *
 * Version History
 * ~~~~~~~~~~~~~~~
 *
 **Version 7.12: 5-Oct-2006
 *
 * A minor bug fix and several minor improvements.
 *
 * Added support for new Advanced Templates (requires
 * the FormMail Computation Module).
 *
 * Added new FILE_OVERWRITE configuration setting.
 *
 * This controls whether existing files will be overwritten
 * during a file upload to the repository (only if uusing     FILE_REPOSITORY)
 *
 * Added NEXT_NUM_FILE configuration setting.  This is a new
 * feature that allows you to generate unique numbers
 * (sequentially generated) for your form submissions.
 *
 * Added CLEANUP_TIME and CLEANUP_CHANCE configuration settings.
 *
 * Currently, these are only used with file uploads.  They
 * specify how to cleanup the scratchpad directory from
 * old file uploads.
 *
 * Added new derive_fields functions:
 * 	ext	returns the extension of a file
 * 	ucase	returns the field value converted to upper case
 * 	lcase	returns the field value converted to lower case
 * 	ltrim	returns the field value with blanks trimmed
 * 		    from the left
 * 	rtrim	returns the field value with blanks trimmed
 * 		    from the right
 * 	trim	returns the field value with blanks trimmed
 * 		    from the left and the right
 * 	ltrim0	returns the field value with blanks and leading
 *          zeroes trimmed from the left
 * 	nextnum	returns a unique number
 *
 * Template field substitutions can now include options.  The
 * only option currently provided is "nobr":
 * 	${fieldname:nobr)
 * nobr prevents new lines in the field from being replaced
 * with HTML <br /> tags.  This is particularly useful
 * for textarea fields.
 *
 * Improvements to the file uploading feature so that
 * files can be uploaded by early pages in a multi-page
 * form sequence.  Previously, only the last page
 * could successfully upload files.
 *
 **Version 7.11: 25-Sep-2006
 *
 * Fixed typographical error in defining the FILE_MODE constant. This typo appears
 * to be harmless as PHP handled it automatically.
 *
 * Added new configuration option, SET_SENDER_FROM_EMAIL,
 * to support yet another server requirement for sending email.
 *
 * Added extensive description of the email logic since different and
 * conflicting server requirements are making it very difficult to
 * understand.
 *
 * Fixed bug in handling multiple email addresses in the INI file
 * (specifically, a list of email addresses for a word in the
 * [email_addresses] section of the INI file.
 *
 **Version 7.10: 07-July-2006
 *
 * Fixes a vulnerability involving file uploads to the server.
 * To be vulnerable, you would need both of these statements
 * to be true:
 *      1. You are using version 7.06 thru 7.09 of FormMail.
 *      2. You have set FILEUPLOADS to true in FormMail's configuration..
 *      3. You have set $FILE_REPOSITORY in FormMail's configuration.
 *
 * If any of these statements are false, then you are not vulnerable.
 *
 * The exploit for the vulnerability (which we won't publish at this time)
 * is complex and specific to each server. In most cases it will not succeed
 * because the web server software cannot write to arbitrary files on
 * the server.
 *
 * We detected this problem though our QA procedures, and we have received
 * no reports of any exploits.
 *
 * Mitigating this vulnerability is the fact that the documentation for
 * file uploading to the server was only published in mid-June 2006. Also,
 * while there are a large number of users of the vulnerable versions,
 * very few enable file uploads to the server.
 *
 **Version 7.09: 30-May-2006
 *
 * Fixes a bug in using FromAddr (mail_options) with AT_MANGLE on some servers
 * (those that require SENDMAIL_F_OPTION and/or INI_SET_FROM).
 * Prior to this version, the FromAddr was not un-mangled before setting
 * it for the server.
 *
 **Version 7.08: 28-Feb-2006
 *
 * Alerts now show the IP address of the user.  Fixed minor issue
 * in last version with showing the 'this_form' in alerts.
 *
 * Fixed some code formatting that had gone wonky.
 *
 * Implemented a new special field called "file_names".  This is
 * similar in syntax to "derive_fields" and allows you to provide
 * different names for uploaded files.
 *
 * Empty derivations are now ignored - previously an alert was generated.
 *
 **Version 7.07: 18-Feb-2006
 *
 * Fixes a minor problem with using a file field name in good_template
 * when the file has been stored on the server.
 *
 * Alert messages now show the referring page or the 'this_form' field
 * so you can identify which form generated the alert.
 *
 * Implemented a Hook System. This allows you to include a PHP file within
 * FormMail at various points.
 *
 * Implemented an "if" function for use when deriving fields.
 *
 **Version 7.06: 14-Feb-2006
 *
 * Added support for a form INI file.  This allows you to set special fields
 * and provide secret email addresses outside of the HTML form.
 *
 * Fixed a problem with processing conditions in the specified order.  This
 * problem would occur if you specified conditions7, conditions2, conditions1
 * in that order.  Now they will be processed in the order specified by their
 * numeric ID.
 *
 * Added support for uploading the files to the server instead of attaching
 * them.
 *
 * Added support for imgverify special field. You can now prevent form
 * submission unless this matches the CAPTCHA string from verifyimg.php.
 *
 * A missing image verification string in the session is now reported
 * as a system error (for imgverify or arverify).  It indicates a failure
 * in the PHP session processing.
 *
 * Added more features for handling file uploads.  A file field can now:
 *  - be tested in "conditions" and "required".  For "required", the value
 *    of the file field is the name of the file uploaded from the user's
 *    computer.  Similarly for "conditions" on string testing.  For
 *    "conditions" performing numeric comparisons, the file field
 *    expands to the size of the uploaded file in bytes.
 *  - be used to derive other fields.  The name of the file is expanded
 *    in the derivation.
 *  - be used in templates.  The name of the file is expanded in the
 *    derivation.
 *  - the size of a file can now be used to derive a field:
 *          fieldname = %size(filefield)%
 *
 * Improved IsFieldEmpty function to handle array values. This is
 * really for future accuracy, as it shouldn't affect any current
 * processing.
 *
 **Version 7.05: 27-Oct-2005
 *
 * Added support for HTTP authentication when using FMBadHandler.
 * FormMail now sends the name and password to FMBadHandler so that
 * it can return to the form.
 *
 * Added support for HTTP authentication when using multi-page forms.
 * This is only needed when returning to the first page, as all other
 * pages are templates.
 *
 **Version 7.04: 26-Sep-2005
 *
 * Removed parentheses which previously surrounded message numbers.
 * Added new optional "mnums=no" parameter when using "testlang=1"
 *
 * Fixed bug in matching "selected" and "checked" attributes when processing
 * multi-page forms. This bug only occurred under rare circumstances.
 * An example is:
 *      <option value="Unselected">
 * In this case, previous versions of FormMail would incorrectly match
 * "selected" in the string "Unselected".  Similarly for "checked".
 * (This bug was also fixed in version 1.10 of FMBadHandler).
 *
 **Version 7.03: 24-Sep-2005
 *
 * Previously, when using multi-page forms on an SSL (HTTPS) connection,
 * the return link for error handling was formatted like:
 *      http://yourdomain:443/.../formmail.php
 * This is technically valid, but was a nuisance, especially when
 * trying to compare this with your $TARGET_URLS settings.
 * Version 7.03 improves this so that the return link is more
 * conventional when using an SSL connection:
 *      https://yourdomain/.../formmail.php
 *
 * Added Attack Detection.  FormMail has always been invulnerable
 * to the attacks it now detects, so Attack Detection is merely to prevent
 * annoying alert messages being sent to you when FormMail is attacked
 * without you having to switch off all alert messages.
 *
 * Added new configuration setting $bShowMesgNumbers which allows you
 * to control whether message numbers are shown with messages.  The default
 * is now "off" - as requested by numerous customers.
 *
 **Version 7.02: 18-Sep-2005
 *
 * Fixed bug in Multi-page forms.  Some internal values were not being
 * set with the right form field values.
 * This meant that CSV files, for example, didn't store any data from
 * previous pages in the sequence.
 *
 * Fixed bug in Multi-page forms whereby later field values were
 * overwritten by earlier ones. For example:
 *      Page 1: set field "abc" to 50
 *      Page 2: set field "abc" to 60
 *      Page 3: sees field "abc" as value 50
 *
 * Added support for "Forward Remembrance" with Multi-page forms.  This
 * means that if a user enters a value on page N, then goes back to previous
 * pages and then moves forward back to page N, they value they entered
 * is restored to the page.  This feature requires the use of "multi_keep"
 * to tell FormMail which fields are to be remember this way.  The sample
 * package called "multitest2.zip" (downloadable from our website) demonstrates
 * this feature.
 *
 **Version 7.01: 20-May-2005
 *
 * Added new configuration setting CHECK_DAYS.  The default is 30, so
 * now version checks only happen every 30 days instead of every 3 days.
 *
 * Mods for old versions of PHP:
 *  - "include" is now prefixed with the @ error control operator
 *  - all "fgets" calls now have the length parameter
 *
 * For Safe Mode operation, chdir for filters now only happens if the
 * directory is not the current directory.  This means you can put the
 * filter command in the same directory as formmail.php and there's a better
 * chance it will work if PHP is in Safe Mode.
 *
 **Version 7.00: 18-Apr-2005
 ******* MAJOR UPGRADE *******
 *
 * Fixed some typographical errors in comments.  Improved some configuration
 * section documentation.
 * Added new configuration settings:
 *      SESSION_NAME        name of the PHP session to use
 *      FMCOMPUTE           name of the fmcompute.php file
 *      FMGEOIP             name of the fmgeoip.php file
 *
 * Added processing of <fmusererror></fmusererror> tags in error templates
 * (these were only processed by FMBadHandler until now).
 *
 * Added support for new <fmsyserror></fmsyserror> tags in error templates.
 *
 * Added multi-page form support, which adds these new configuration:
 * settings:
 *      MULTIFORMDIR
 *      MULTIFORMURL
 *
 * Improved use of $SET_REAL_DOCUMENT_ROOT so $REAL_DOCUMENT_ROOT is
 * set from it before it is used in the default "encode" setting.
 *
 **Version 6.02: 17-Mar-2005
 *
 * Added system error message to the alert that's sent when a check file
 * cannot be created.
 *
 * Added the "null" filter.
 *
 * Added new configuration setting ZERO_IS_EMPTY.
 *
 * Renamed "fm_modules" to "fmmodules".
 *
 * Implemented "and" for "conditions" testing.
 *
 **Version 6.01: 11-Mar-2005
 *
 * EMAIL_NAME now includes '-', so you can use this to match email
 * addresses like "jack-smith@somesite.com".
 * The Upgrade Wizard will put in the new value and discard your
 * previous setting.
 *
 * Added some more comments/examples for Windows Servers.
 *
 * Added new filter options "KeepInLine".  If you use the Attach option,
 * you can also specify KeepInLine.  KeepInLine causes the filtered
 * results to be kept in the body of the email as well as being attached
 * according to the Attach option.  KeepInLine is ignored if Attach is
 * not specified.
 *
 **Version 6.00: 20-Feb-2005
 ******* MAJOR UPGRADE *******
 *
 * Added support for new FMCompute module.  This creates new special
 * fields called "fmcompute" or "fmcompute1...N", and "fm_modules".
 * Adds new configuration $MODULEDIR to hold the directory for
 * modules.
 * Added GeoIP module support via FMCompute.  Adds new configuration
 * $GEOIP_LIC to hold your MaxMind license code.
 * Created IncludePath functions.
 *
 **Version 5.03: 31-Jan-2005
 *
 * Workaround a problem with empty file uploads on some
 * servers and/or PHP versions.
 *
 **Version 5.02: 19-Jan-2005
 *
 * Fixed problems with upgrading and copying the $FROM_USER and
 * $REAL_DOCUMENT_ROOT configurations.  $REAL_DOCUMENT_ROOT has
 * been replaced with a setting called "$SET_REAL_DOCUMENT_ROOT".
 *
 * Added support for Environment Variables and Server Variables
 * to be accessed to create derived fields.
 *
 * Fixed bug in last version when processing FromAddr.
 *
 **Version 5.00rc1: 10-Dec-2004
 ******* MAJOR UPGRADE FOR INTERNATIONALIZATION *******
 *
 * Added support for languages other than English.
 *
 * FromAddr is now processed with the AT_MANGLE feature...this means you
 * can hide this mail_options setting from spam bots too.
 *
 * Altered some error messages.  Socket filter errors are no longer shown
 * to the user.
 *
 **Version 4.10: 9-Dec-2004
 *
 * Added default setting for $TEMPLATEURL - without it the Upgrade Wizard
 * failed to upgrade properly.
 * Fixed bug in filtering process.  This bug would probably not manifest
 * on Unix servers, but may do on Windows servers.
 *
 **Version 4.09: 8-Dec-2004
 *
 * Added new configuration options:
 *		SENDMAIL_F_OPTION, which supersedes the "SendMailFOption" specification
 *		in "mail_options" in forms
 *		INI_SET_FROM which allows you to workaround bad PHP
 *		configurations on Windows servers
 *
 **Version 4.08: 29-Nov-2004
 *
 * More changes to set $REAL_DOCUMENT_ROOT correctly.  This is now
 * also an optional configuration setting.
 *
 **Version 4.07: 29-Nov-2004
 *
 * Fixed bugs with handling regular expressions in "conditions" on
 * server configurations with magic_quotes_gpc set On.
 * With magic_quotes_gpc set On, any backslashes in your regular
 * expressions would be stripped, thereby changing the meaning of your
 * regular expressions.
 *
 * Fixed bugs with handling slashes in data. Backslashes were being stripped
 * twice on server configurations with magic_quotes_gpc set On.
 *
 * Also fixes problems with storing CSV data that contains innocuous
 * slashes. With LIMITED_IMPORT set to true, backslashes were being
 * unnecessarily stripped.
 * With LIMITED_IMPORT set to false, backslashes in data could cause the CSV
 * file to be unreadable by an intelligent importing program because they
 * were not being backslashed.  They are now backslased (escaped).
 *
 **Version 4.06: 26-Nov-2004
 *
 * Removed unused variable that would cause a warning message
 * on some systems.
 *
 **Version 4.05: 23-Nov-2004
 *
 * Removed debugging code that could prevent correct setting of
 * $REAL_DOCUMENT_ROOT.
 * A failure to send an alert message with the "testalert" feature
 * now displays an error message.
 * Added support for sending mail using PEAR.
 *
 **Version 4.04: 20-Nov-2004
 *
 * Disables "magic_quotes_runtime" setting, which breaks just about everything.
 *
 **Version 4.03: 14-Nov-2004
 *
 * Added new mail_options setting "FromAddr".
 * You can specify an empty value or any email address.  If this option is
 * used, the sender of form results will be set to the given address
 * instead of the value of the "email" field. This feature is necessary
 * for certain servers which don't let software specify an arbitrary
 * sender address.  Yahoo is one such hosting service.
 *
 **Version 4.02: 28-Oct-2004
 *
 * Improved to handle PHP sessions for browsers with cookies disabled.
 * This is primarily useful with Error Handling (including with our
 * FMBadHandler script).
 *
 **Version 4.01: 16-Oct-2004
 *
 * Improved setting of $REAL_DOCUMENT_ROOT.  This means the standard
 * filter setting for "encode" is more likely to work without change
 * on any server.
 *
 * Improved "testalert" feature to include some server variables in the
 * email.
 *
 **Version 4.00: 12-Oct-2004
 ******* MAJOR UPGRADE *******
 *
 * This new version provides new features that will be useful to
 * users of FormMailDecoder.
 *
 * Added support for "filter_fields" feature.  Your forms can now
 * select which fields are to be filtered (encoded).  All other
 * fields will be shown normally.  The behaviour of this feature is
 * reasonably logical if you're also using the PlainTemplate and HTMLTemplate
 * features.  However, if you are using them, we recommend that you
 * also specify the Attach feature in "filter_options".
 *
 * Added support for "filter_options" feature.  Allows you to control
 * the way a filter operates.  Currently, only the "Attach" feature is
 * provided:
 *		Attach	if specified, the output of the filter is attached
 *				to the email instead of being inside the body of the
 *				message. You must provide the name of the file.
 *				Some examples:
 *					Attach=ccard.fmencoded
 *					Attach=data.txt
 *
 * See the HOW-TO guide on filtering for more information about these
 * new features (http://www.tectite.com/fmhowto/guides.php).
 *
 **Version 3.01: 22-Sep-2004
 *
 * Workaround a problem in Microsoft IIS with uploaded files.
 *
 **Version 3.00: 2-Sep-2004
 ******* MAJOR UPGRADE *******
 *
 * Implemented the long-awaited Auto Responder feature!  Requires
 * version 1.01 of "verifyimg.php".
 *
 * Improved the "Exclude" mail_option so that "realname" and "email"
 * special fields can be excluded from the body of the email.
 *
 * Added PlainTemplate mail_option feature.  You can now create a template
 * that will be used for sending you a plain text email.  You can use this,
 * for example, to put the data into CSV format.
 *
 **Version 2.17: 31-Aug-2004
 *
 * When filling templates, values are now converted so that HTML
 * special characters in the values cannot break the HTML output.
 *
 * Alert messages now include the subject from the Form.  Thanks
 * to Doug Wright for suggesting this.
 *
 * Added new "template_list_sep" hidden field.  If you have list-type
 * fields in your form (checkboxes, multi-selection list boxes) and these
 * are expanded in a template, then FormMail uses "," to separate the values
 * by default.  You can specify a different separator with the
 * template_list_sep hidden field.  For example,
 *		<input type="hidden" name="template_list_sep" value="<br />" />
 * will give you line breaks instead of comma.
 *
 * Added new mail_options setting "CharSet".  Your form can specify the
 * character set to be used in emails with this option.  For example,
 *	<input type="hidden" name="mail_options" value="CharSet=utf-8" />
 * Thanks to Wojtek Linde for requesting this feature.
 * The default remains ISO-8859-1.
 *
 **Version 2.16: 18-Aug-2004
 *
 * Added new "good_template" hidden field.  This defines the template
 * to output (and fill) to the browser on successful submission.
 *
 * Added new "crm_options" hidden field to control processing
 * of CRM submissions.
 *
 * Added support for templates from URLs.  This means you can use a
 * URL from $TEMPLATEURL instead of a file from $TEMPLATEDIR.  This is great for
 * dynamically generated web pages.  This adds a new configuration variable
 * called $TEMPLATEURL.
 *
 **Version 2.15: 4-Aug-2004
 *
 * Fixed a bug in testing the PHP version - a couple of lines
 * were in the wrong order.  This should stop "Undefined offset"
 * error form appearing in your php_errors file.
 *
 * Fixed bug in handling HTML + text emails with file attachments.
 * This bug was introduced after version 2.12.
 *
 * Improved MIME compliance with internal headers when BODY_LF is set
 * to something other than "\r\n".  Improved to use the HEAD_CRLF
 * configuration variable.
 *
 **Version 2.14: 13-Jul-2004
 *
 * Fixed problem with using sslencode filter.
 * Small redesign in the definition of filters for HTTP and HTTPs access so
 * that the FormMail Upgrade Wizard can be used to upgrade FormMail
 * to contain these new features.
 *
 **Version 2.13: 12-Jul-2004
 *
 * Added support for executing filters via HTTP and HTTPS connections.
 * This overcomes the problem on some servers where even CGI-BIN programs
 * cannot be executed through PHP's "popen" or "system" functions.
 *
 **Version 2.12: 25-Jun-2004
 *
 * Fixed bug in passing array variables to the bad_url via the session.
 *
 * Added new "SendMailFOption" option for "mail_options".  This causes
 * FormMail to provide the "-faddr" option when it calls the "mail" function.
 * This is needed by certain sendmail server installations.
 *
 **Version 2.11: 23-Jun-2004
 *
 * Improved further so that if no email address is provided the From line
 * is excluded (having a name only is not valid to RFC822).
 * Fixed some typos in comments.
 *
 **Version 2.10: 21-Jun-2004
 *
 * Improved creation of email's From line - if neither the email
 * or realname is provided, no From line is included in the email.
 *
 **Version 2.09: 29-May-2004
 *
 * Fixed bug: mail_options Exclude feature wouldn't allow a single field
 * name.
 *
 * Derived fields can now include arbitrary literal character using
 * this ASCII hexadecimal notation: %HH% where HH is two hexadecimal
 * characters: for example, 27 is a single quote, 2B is +, 2E is ., etc.
 *
 * Added simple check for internet spiders....no alert is sent.
 *
 * Added CONFIG_CHECK feature - currently checks for security
 * issues in TARGET_EMAIL patterns.
 *
 * Improved to destroy session data when no longer needed.
 *
 **Version 2.08: 23-May-2004
 *
 * Fixed bug: wasn't handling 'ampm' in derived fields expansions.
 *
 * Added support for version check on servers that don't provide SERVER_NAME
 * (now uses a unique ID derived from $TARGET_EMAIL[0] instead of SERVER_NAME).
 *
 * Added optional SCRATCH_PAD configuration so that you can specify the
 * a directory that FormMail can write to on your server.
 *
 * Temporary files are now created in SCRATCH_PAD if it's configured.
 *
 * Alert messages are now filtered if a filter is specified (this is for
 * security purposes on the assumption that the filter is an encryption
 * program).
 *
 * Alert messages now use BODY_LF everywhere for line termination.
 *
 **Version 2.07: 13-May-2004
 *
 * Fixed incorrect documentation for $CSVOPEN feature introduced
 * in v2.06.
 *
 * Added $CSVLINE configuration.  Use this to customize your line
 * terminations in CSV files
 *
 **Version 2.06: 12-May-2004
 *
 * Added $CSVOPEN configuration.  Use this to ensure a text file
 * format for your operating system.
 *
 **Version 2.05: 11-May-2004
 *
 * Added $CSVQUOTE configuration.  This allows you to specify
 * the character used for quoting fields in a CSV file.  If you don't
 * want quotes, you can set it to any empty string.
 * Quotes within fields in a CSV file are now swapped to the opposite
 * quote of that specified in $CSVQUOTE.
 *
 **Version 2.04: 10-May-2004
 *
 * Passes some more information to the bad_url.  This information is
 * used by fmbadhandler.php.
 * Template expansions now treat empty fields as missing.
 * Template expansions now put HTML BR tags where any new lines are found.
 * Some alerts provide more specific information
 * Added ALERT_ON_USER_ERROR configuration.
 * Switched off DEBUG mode that was accidentally left on.
 * The version check flag file now shows the server name.
 * The version check now works even if SERVER_NAME is not available.
 *
 **Version 2.03: 3-May-2004
 *
 * Internal release - not generally available.
 *
 **Version 2.02: 1-May-2004
 *
 * Fixed a problem that caused empty conditions to generate an alert message.
 * Since empty conditions are the default, that's an annoying problem!
 * Changed "Revision" to "Version" in this Version History.
 *
 **Version 2.01: 1-May-2004
 *
 * Added support for creating date and time fields automatically.
 * Fixed some line formatting.
 *
 **Version 2.00: 1-May-2004
 ******* MAJOR UPGRADE *******
 *
 * Several sections re-written to improve consistency and logic checking.
 *
 * Default FILTERS now includes "fmencoder".
 *
 * Added support for "cc" and "bcc" addresses.  This only have an
 * effect if "recipients" have also been specified.
 *
 * Added support for form checkboxes and multiple-selection lists
 * (thanks to Ted Boardman for getting us started on that).
 *
 * Added a lot more checking and reporting of errors or problems.
 *
 * Added a special test parameter to confirm that the DEF_ALERT setting
 * is working.  The DEF_ALERT address is no longer subject to
 * verification through TARGET_EMAIL.  You can now specify any address
 * for DEF_ALERT.  ("alert_to" from a form is still tested against
 * TARGET_EMAIL).
 *
 * Added support for file uploads.  Note, the form must specify:
 *		enctype="multipart/form-data" method="post"
 * (this is a requirement of file uploading, not FormMail).
 *
 * Added support for "mail_options" field.  This provides
 * extra control from the form. Options supported:
 *		NoEmpty		FormMail won't send results for fields that are empty.
 *		KeepLines	fields which contain lines (e.g. TEXTAREA's) keep the
 *					lines; without this option (i.e. the default) FormMail
 *					joins the lines together
 *		AlwaysList	don't format as an email even if there's only one
 *					non-special field.  If this option is set, the email is
 *					always formatted like this:
 *						name1: value1
 *						name2: value2
 *		DupHeader	duplicate some header lines in the body of the email;
 *					this was the default prior to Version 2.00.  If you've
 *					upgraded from 1.XX and you want your emails to look the
 *					same, include this option.
 *		StartLine	include a --START-- line before the fields.  This
 *					option only works if you also specify BodyHeader.
 *					If you've upgraded from 1.XX and you want your emails to
 *					look the same, include this option.  The --START-- line
 *					is useful for some filter programs.
 *		Exclude		a list of fields to exclude from the email (special
 *					fields cannot be excluded)
 *		HTMLTemplate name of a template file to use to create an HTML
 *					formatted email
 *		PlainTemplate name of a template file to use to create an plain text
 *					email
 *		TemplateMissing string to insert for fields that are empty,
 *					when filling an email template (HTMLTemplate or PlainTemplate)
 *		CharSet		the character set to specify in the Content-Type for
 *					emails.  Default is ISO-8859-1.
 *
 * CSV file support now provides configurable separators (see
 * $CSVSEP, $CSVINTSEP, and $CSVQUOTE).
 *
 * Improved list processing so that list items can whitespace
 * around them (e.g. <input ... name="csvcolumns" value="col1, col2, col3">).
 *
 * Added support for derived fields.
 *
 * Errors are now distinguished between internal and user error.  A user
 * error is, for example, failure to enter a field.  Internal errors are
 * now shown as a generic message to the user (since the user can't do
 * anything about them).
 *
 * Generated pages are now XHTML compliant.
 *
 * Redirects now use several methods to perform the redirect:
 *		Location header
 *		JavaScript redirect
 *		Text for the user: "please click here"
 *
 * All files that are opened are now subject to special processing to
 * prevent security breaches.
 *
 * All URLs that FormMail will open are now checked against the
 * TARGET_URLS setting (security feature).
 *
 * Added advanced tests in the "required" feature.
 *
 * Added complex field validations through the new "conditions" feature.
 *
 * Added new "bad_template" feature for customizing the error page.
 *
 * Improved "bad_url" handling - more error fields and data is now
 * send to "bad_url" so that it can redirect back to the original form.
 *
 * Added automatic regular check for new version of FormMail.
 *
 ******************************************************************************
 *
 **Version 1.22: 11-Feb-2004
 * Improved filter logic to handle options which might have slashes in them.
 * For example, a filter like "/path/to/fmencoder -k/path/to/keyfile.txt"
 * would not work (because the directory name was not evaluated correctly).
 * Added some more information when reporting filter failures.
 *
 **Version 1.21: 24-Jan-2004
 * Fixed bug: required fields were not being checked if the form
 * was not sending email (e.g. if it was just writing to a CSV file).
 * Added alert messages for failure to open CSV and LOG files.
 * Improved some documentation and added some TARGET_EMAIL example lines.
 *
 **Version 1.19 & 1.20: 19-Jan-2004
 * Added support for missing environment variables: if an environment variable
 * isn't in the environment, then FormMail looks in the server variables for it.
 *
 * Improved support for different server configurations; if SCRIPT_FILENAME
 * is not available, PATH_TRANSLATED is used; if one or more isn't available
 * no error message is produced (previous version displayed an error message
 * depending on the PHP configuration).
 *
 * Added configuration option for line termination in the email body.
 *
 * The FormMail version is now displayed in the default error page.
 *
 **Version 1.18: 13-Jan-2004
 * Fixed a problem when mail sending failed; now, FormMail reports the error
 * to the user (by going to bad_url or generating the standard error page)
 * instead of showing success.
 * Added support for GET method of form submission (FormMail automatically
 * detects the method from the PHP Server variables).
 *
 **Version 1.16 & 1.17: 4-Jan-2004 & 5-Jan-2004
 * Added support for PHP versions before 4.2.3 (i.e. from 4.0.0 onwards).
 *
 **Version 1.14 & 1.15: 3-Jan-2004
 * Added some more comments.
 *
 **Version 1.13: 29-Dec-2003
 * Added Quick Start section, some more samples, and some more comments.
 *
 **Version 1.12: 26-Sep-2003
 * Replaced use of PATH_TRANSLATED with the more reliable SCRIPT_FILENAME.
 *
 **Version 1.10 & 1.11: 16-Sep-2003
 * Added handling of magic_quotes_gpc setting.
 *
 **Version 1.9: 5-Sep-2003
 * Added ex/vi initialisation string.
 *
 **Version 1.8: 9-Jul-2003
 * Added a workaround for a PHP bug: http://bugs.php.net/bug.php?id=21311
 *
 **Version 1.7: 19-May-2003
 * If a form contains only one non-special field (a "special" field is
 * one of the pre-defined ones, like "email", "realname"), then formmail.php
 * formats the single field as the email to be sent.  This feature allows
 * formmail.php to be used for a simple email interface.
 * Modified some wordings.
 *
 **Version 1.4: 13-May-2003
 * First released version.
 */

	//
	// Capture the current date and time, for various purposes.
	//
$lNow = time();

set_magic_quotes_runtime(0);		// disable this silly setting (usually not enabled)
ini_set('track_errors',1);			// enable $php_errormsg

$aAlertInfo = array();

$aPHPVERSION = array();

$sLangID = "";						// the language ID
$aMessages = array();				// all FormMail messages in the appropriate
									// language

	//
	// the following constants define all FormMail messages
	//
define('MSG_SCRIPT_VERSION',0);		// This script requires at least PHP version...
define('MSG_END_VERS_CHK',1);		// If you're happy...
define('MSG_VERS_CHK',2);			// A later version of FormMail is available...
define('MSG_CHK_FILE_ERROR',3);		// Unable to create check file...
define('MSG_UNK_VALUE_SPEC',4);		// derive_fields: unknown value specification...
define('MSG_INV_VALUE_SPEC',5);		// derive_fields: invalid value specification...
define('MSG_DERIVED_INVALID',6);	// Some derive_fields specifications...
define('MSG_INT_FORM_ERROR',7);		// Internal form error...
define('MSG_OPTIONS_INVALID',8);	// Some mail_options settings...
define('MSG_PLSWAIT_REDIR',9);		// Please wait while you are redirected...
define('MSG_IFNOT_REDIR',10);		// If you are not redirected...
define('MSG_PEAR_OBJ',11);			// Failed to create PEAR Mail object...
define('MSG_PEAR_ERROR',12);		// PEAR Mail error...
define('MSG_NO_FOPT_ADDR',13);		// You have specified "SendMailFOption"...
define('MSG_MORE_INFO',14);			// More information...
define('MSG_INFO_STOPPED',15);		// Extra alert information suppressed...
define('MSG_FM_ALERT',16);			// FormMail alert
define('MSG_FM_ERROR',17);			// FormMail script error
define('MSG_FM_ERROR_LINE',18);		// The following error occurred...
define('MSG_USERDATA_STOPPED',19);	// User data suppressed...
define('MSG_FILTERED',20);			// This alert has been filtered...
define('MSG_TEMPLATES',21);			// You must set either TEMPLATEDIR or TEMPLATEURL...
define('MSG_OPEN_TEMPLATE',22);		// Failed to open template...
define('MSG_ERROR_PROC',23);		// An error occurred while processing...
define('MSG_ALERT_DONE',24);		// Our staff have been alerted...
define('MSG_PLS_CONTACT',25);		// Please contact us directly...
define('MSG_APOLOGY',26);			// We apologize for any inconvenience...
define('MSG_ABOUT_FORMMAIL',27);	// Your form submission was processed by...
define('MSG_PREG_FAILED',28);		// preg_match_all failed in FindCRMFields...
define('MSG_URL_INVALID',29);		// CRM URL "$URL" is not valid...
define('MSG_URL_OPEN',30);			// Failed to open Customer Relationship...
define('MSG_CRM_FAILED',31);		// Failure report from CRM...
define('MSG_CRM_FORM_ERROR',32);	// Your form submission was not...
define('MSG_OR',33);				// "$ITEM1" or "$ITEM2"
define('MSG_NOT_BOTH',34);			// not both "$ITEM1" and "$ITEM2"
define('MSG_XOR',35);				// "$ITEM1" or "$ITEM2" (but not both)
define('MSG_IS_SAME_AS',36);		// "$ITEM1" is the same as "$ITEM2"
define('MSG_IS_NOT_SAME_AS',37);	// "$ITEM1" is not the same as "$ITEM2"
define('MSG_REQD_OPER',38);			// Operator "$OPER" is not valid for "required"
define('MSG_PAT_FAILED',39);		// Pattern operator "$OPER" failed: pattern...
define('MSG_COND_OPER',40);			// Operator "$OPER" is not valid...
define('MSG_INV_COND',41);			// Invalid "conditions" field...
define('MSG_COND_CHARS',42);		// The conditions field "$FLD" is not valid...
define('MSG_COND_INVALID',43);		// The conditions field "$FLD" is not valid...
define('MSG_COND_TEST_LONG',44);	// Field "$FLD" has too many components...
define('MSG_COND_IF_SHORT',45);		// Field "$FLD" has too few components for...
define('MSG_COND_IF_LONG',46);		// Field "$FLD" has too many components for...
define('MSG_COND_UNK',47);			// Field "$FLD" has an unknown command word...
define('MSG_MISSING',48);			// Missing "$ITEM"...
define('MSG_NEED_ARRAY',49);		// "$ITEM" must be an array...
define('MSG_SUBM_FAILED',50);		// Your form submission has failed...
define('MSG_FILTER_WRONG',51);		// Filter "$FILTER" is not properly...
define('MSG_FILTER_CONNECT',52);	// Could not connect to site "$SITE"...
define('MSG_FILTER_PARAM',53);		// Filter "$FILTER" has invalid parameter...
define('MSG_FILTER_OPEN_FILE',54);	// Filter "$FILTER" cannot open file...
define('MSG_FILTER_FILE_ERROR',55);	// Filter "$FILTER": read error on file...
define('MSG_FILTER_READ_ERROR',56);	// Filter '$filter' failed: read error...
define('MSG_FILTER_NOT_OK',57);		// Filter 'FILTER' failed...
define('MSG_FILTER_UNK',58);		// Unknown filter...
define('MSG_FILTER_CHDIR',59);		// Cannot chdir...
define('MSG_FILTER_NOTFOUND',60);	// Cannot execute...
define('MSG_FILTER_ERROR',61);		// Filter "$FILTER" failed...
define('MSG_FLD_NOTFOUND',62);		// "$FIELD" is not a field submitted...
define('MSG_TEMPLATE_ERRORS',63);	// Template "$NAME" caused the...
define('MSG_TEMPLATE_FAILED',64);	// Failed to process template "$NAME"...
define('MSG_MIME_PREAMBLE',65);		// (Your mail reader should not show this...
define('MSG_MIME_HTML',66);			// This message has been generated by FormMail...
define('MSG_FILE_OPEN_ERROR',67);	// Failed to open file "$NAME"...
define('MSG_ATTACH_DATA',68);		// Internal error: AttachFile requires...
define('MSG_PHP_HTML_TEMPLATES',69);	// HTMLTemplate option is only ...
define('MSG_PHP_FILE_UPLOADS',70);	// For security reasons, file upload...
define('MSG_FILE_UPLOAD',71);		// File upload attempt ignored...
define('MSG_FILE_UPLOAD_ATTACK',72);// Possible file upload attack...
define('MSG_PHP_PLAIN_TEMPLATES',73);// PlainTemplate option is only...
define('MSG_ATTACH_NAME',74);		// filter_options: Attach must contain a name...
define('MSG_PHP_BCC',75);			// Warning: BCC is probably not supported...
define('MSG_CSVCOLUMNS',76);		// The "csvcolumns" setting is not...
define('MSG_CSVFILE',77);			// The "csvfile" setting is not...
define('MSG_TARG_EMAIL_PAT_START',78);	// Warning: Your TARGET_EMAIL pattern...
define('MSG_TARG_EMAIL_PAT_END',79);	// Warning: Your TARGET_EMAIL pattern...
define('MSG_CONFIG_WARN',80);		// The following potential problems...
define('MSG_PHP_AUTORESP',81);		// Autorespond is only supported...
define('MSG_ALERT',82);				// This is a test alert message...
define('MSG_NO_DEF_ALERT',83);		// No DEF_ALERT value has been set....
define('MSG_TEST_SENT',84);			// Test message sent.  Check your email.....
define('MSG_TEST_FAILED',85);		// FAILED to send alert message...
define('MSG_NO_DATA_PAGE',86);		// This URL is a Form submission program...
define('MSG_REQD_ERROR',87);		// The form required some values that you...
define('MSG_COND_ERROR',88);		// Some of the values you provided...
define('MSG_CRM_FAILURE',89);		// The form submission did not succeed...
define('MSG_FOPTION_WARN',90);		// Warning: You've used SendMailFOption in...
define('MSG_NO_ACTIONS',91);		// The form has an internal error...
define('MSG_NO_RECIP',92);			// The form has an internal error...
define('MSG_INV_EMAIL',93);			// Invalid email addresses...
define('MSG_FAILED_SEND',94);		// Failed to send email...
define('MSG_ARESP_EMAIL',96);		// No "email" field was found. Autorespond...
define('MSG_ARESP_SUBJ',97);		// Your form submission...
define('MSG_LOG_NO_VERIMG',98);		// No VerifyImgString in session...
define('MSG_ARESP_NO_AUTH',99);		// Failed to obtain authorization...
define('MSG_LOG_NO_MATCH',100);		// User did not match image...
define('MSG_ARESP_NO_MATCH',101);	// Your entry did not match...
define('MSG_LOG_FAILED',102);		// Failed
define('MSG_ARESP_FAILED',103);		// Autoresponder failed
define('MSG_LOG_OK',104);			// OK
define('MSG_THANKS_PAGE',105);		// Thanks!  We've received your....
define('MSG_LOAD_MODULE',106);      // Cannot load module....
define('MSG_LOAD_FMCOMPUTE',107);   // Cannot load FMCompute....
define('MSG_REGISTER_MODULE',108);  // Cannot register module....
define('MSG_COMP_PARSE',109);       // These parse errors occurred....
define('MSG_COMP_REG_DATA',110);    // Failed to register data field....
define('MSG_COMP_ALERT',111);       // The following alert messages....
define('MSG_COMP_DEBUG',112);       // The following debug messages...
define('MSG_COMP_EXEC',113);        // The following errors occurred....
define('MSG_REG_FMCOMPUTE',114);    // Cannot register function...
define('MSG_USER_ERRORS',115);      // A number of errors occurred...
define('MSG_CALL_PARAM_COUNT',116); // Invalid parameter count...
define('MSG_CALL_UNK_FUNC',117);    // Unknown function...
define('MSG_SAVE_FILE',118);        // Failed to save file....
define('MSG_CHMOD',119);            // Failed to chmod file....
define('MSG_VERIFY_MISSING',120);   // Image verification string missing...
define('MSG_VERIFY_MATCH',121);     // Your entry did not match...
define('MSG_FILE_NAMES_INVALID',122);// Some file_names specifications...
define('MSG_FILE_NAMES_NOT_FILE',123);// Your file_names specification...
define('MSG_TEMPL_ALERT',124);       // The following alert messages....
define('MSG_TEMPL_DEBUG',125);       // The following debug messages...
define('MSG_TEMPL_PROC',126);        // The following errors occurred....
define('MSG_SAVE_FILE_EXISTS',127);  // Cannot save file....

define('MSG_AND',133);				// "$ITEM1" and "$ITEM2"
define('MSG_NEXT_PLUS_GOOD',134);	// The form specifies both next_form and....
define('MSG_MULTIFORM',135);		// You must set either MULTIFORMDIR or MULTIFORMURL...
define('MSG_MULTIFORM_FAILED',136);	// Failed to process multi-page form template "$NAME"...
define('MSG_NEED_THIS_FORM',137);	// Multi-page forms require "this_form" field...
define('MSG_NO_PHP_SELF',138);	    // PHP on the server is not providing "PHP_SELF"
define('MSG_RETURN_URL_INVALID',139); // Return "$URL" is not valid...
define('MSG_GO_BACK',140);          // Cannot 'go back' if not a multi-page form...
define('MSG_OPEN_URL',141);         // Cannot open URL...
define('MSG_CANNOT_RETURN',142);    // Cannot return to page....
define('MSG_ATTACK_DETECTED',143);  // Server attack detected....
define('MSG_ATTACK_PAGE',144);      // Your form submission....
define('MSG_ATTACK_MIME_INFO',145); // The field "$FLD" contained...
define('MSG_ATTACK_DUP_INFO',146);  // The fields "$FLD1" and...
define('MSG_ATTACK_SPEC_INFO',147); // Special field "$FLD"...
define('MSG_NEED_SCRATCH_PAD',148); // You need to set SCRATCH_PAD...
define('MSG_MULTI_UPLOAD',149);     // File upload processing failed during multi-page form processing.
define('MSG_OPEN_SCRATCH_PAD',150); // Cannot open directory...
define('MSG_NO_NEXT_NUM_FILE',151); // You cannot use the %nextnum% feature...
define('MSG_NEXT_NUM_FILE',152);    // Cannot process next number...


define('MSG_URL_PARSE',160);        // URL parse failed
define('MSG_URL_SCHEME',161);       // Unsupported URL scheme...
define('MSG_SOCKET',162);           // Socket error ...
define('MSG_GETURL_OPEN',163);      // Open URL failed: ...

    //
    // The following are PHP's file upload error messages
    //
define('MSG_FILE_UPLOAD_ERR_UNK',180);	// Unknown error code.
define('MSG_FILE_UPLOAD_ERR1',181);		// The uploaded file exceeds the upload_max_filesize directive in php.ini.
define('MSG_FILE_UPLOAD_ERR2',182);		// The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the html form.
define('MSG_FILE_UPLOAD_ERR3',183);		// The uploaded file was only partially uploaded.
define('MSG_FILE_UPLOAD_ERR4',184);		// No file was uploaded.
define('MSG_FILE_UPLOAD_SIZE',189);     // Uploaded file "$NAME" is too big...
                                        // (not a PHP error code - internal maximum file size error)

    //
    // following are for derive_fields functions
    //
define('MSG_DER_FUNC_ERROR',200);       // derive_fields: invalid function....
define('MSG_DER_FUNC_SIZE_FMT',201);    // function 'size' requires....
define('MSG_DER_FUNC_IF_FMT',202);      // function 'if' requires....
define('MSG_DER_FUNC_NEXTNUM_FMT',203); // function 'nextnum' requires....
define('MSG_DER_FUNC_EXT_FMT',204);     // function 'ext' requires....
define('MSG_DER_FUNC1_FMT',205);        // function 'FUNC' requires....

// <A NAME="MessageNumbers"> Jump to: <A HREF="#BuiltinMessages">

	//
	// Return true if using the built-in language
	//
function IsBuiltInLanguage()
{
	global	$sLangID;

	return (strpos($sLangID,"builtin") !== false);
}

$sSavePath = "";
$bPathSaved = false;
	//
	// Set include path to include the given directory.
	//
function AddIncludePath($s_dir = ".")
{
    global  $sSavePath,$bPathSaved;

	$s_path = ini_get('include_path');
    $i_path_len = strlen($s_path);
    $s_sep = IsServerWindows() ? ";" : ":";     // get path separator
		//
		// look for it in the include_path
		//
    $b_found = false;
    $i_pos = 0;
    $i_len = strlen($s_dir);
    while (!$b_found && ($i_pos = strpos($s_path,$s_dir,$i_pos)) !== false)
    {
        if ($i_pos == 0)
        {
            if ($i_len == $i_path_len)
                $b_found = true;        // the path only has $s_dir
            elseif ($s_path{$i_len} == $s_sep)
                $b_found = true;
        }
        elseif ($s_path{$i_pos-1} == $s_sep &&
                    ($i_pos + $i_len == $i_path_len ||
                    $s_path{$i_pos + $i_len} == $s_sep))
                $b_found = true;
        if (!$b_found)
            $i_pos++;
    }
    if (!$b_found)
	{
            //
            // allow multiple calls, but only store the original path once
            //
        if (!$bPathSaved)
            $sSavePath = $s_path;
        if (empty($s_path))
            $s_path = $s_dir;
        else
                //
                // prepend the directory
                //
            $s_path = $s_dir.$s_sep.$s_path;
	    ini_set('include_path',$s_path);
		$bPathSaved = true;
	}
}

    //
    // Reset the include path after a call to AddIncludePath.
    //
function ResetIncludePath()
{
    global  $sSavePath,$bPathSaved;

    if ($bPathSaved)
    {
		ini_set('include_path',$sSavePath);
        $bPathSaved = false;
    }
}

	//
	// Load a language file
	//
function LoadLanguageFile()
{
	global	$aMessages,$sLangID;

    AddIncludePath();
	@include("language.inc");
    ResetIncludePath();
}

	//
	// Load the messages array from the default language, and then
	// override with an optional language file.
	// Note: all messages get the MNUM parameter sent which they can use.
	// If they don't use it, the message number is appended.
	//
function LoadBuiltinLanguage()
{
	global	$aMessages,$sLangID;

	$sLangID = "English (builtin)";
		// MSG_SCRIPT_VERSION is shown if the PHP version is too old to run
		// FormMail
		// Parameters:
		// 	$PHPREQ		is the minimum required PHP version
		//	$PHPVERS	is	the version the server currently has installed.
	$aMessages[MSG_SCRIPT_VERSION] = 'This script requires at least PHP version '.
									 '$PHPREQ.  You have PHP version $PHPVERS.';

		// MSG_END_VERS_CHK is sent at the end of an Alert message when
		// FormMail detects that there's a newer version available
		// Parameters: none
	$aMessages[MSG_END_VERS_CHK] =	'***************************************************\n'.
									'If you are happy with your current version and want\n'.
									'to stop these reminders, edit formmail.php and\n'.
									'set CHECK_FOR_NEW_VERSION to false.\n'.
									'***************************************************\n';

		// MSG_VERS_CHK is sent in an Alert message when
		// FormMail detects that there's a newer version available
		// Parameters:
		//	$TECTITE	the website to go to
		//	$FM_VERS	the current FormMail version
		//	$NEWVERS	the new FormMail version that's available
	$aMessages[MSG_VERS_CHK] =	'A later version of FormMail is available from $TECTITE.\n'.
								'You are currently using version $FM_VERS.\n'.
								'The new version available is $NEWVERS.\n';

		// MSG_CHK_FILE_ERROR is sent in an Alert message when
		// FormMail cannot create a file to record the time of version check.
		// Parameters:
		//	$FILE   the file name that could not be created
        //  $ERROR  the actual error message
	$aMessages[MSG_CHK_FILE_ERROR] = 'Unable to create check file "$FILE": $ERROR';

		// MSG_UNK_VALUE_SPEC is sent in an Alert message when
		// a form uses an unknown value specification in derive_fields.
		// Parameters:
		//	$SPEC	the unknown value specification
        //  $MSG    additional message
	$aMessages[MSG_UNK_VALUE_SPEC] = 'derive_fields: unknown value specification '.
                                     '"$SPEC"$MSG';

		// MSG_INV_VALUE_SPEC is sent in an Alert message when
		// a form uses a value specification in derive_fields that's
		// formatted incorrectly (missing terminating '%')
		// Parameters:
		//	$SPEC	the invalid value specification
	$aMessages[MSG_INV_VALUE_SPEC] = 'derive_fields: invalid value specification '.
									 '"$SPEC" (possibly missing a "%")';

		// MSG_DERIVED_INVALID is sent in an Alert message when
		// a form's derive_fields setting has errors
		// Parameters: none
		// A list of errors is appended on separate lines
	$aMessages[MSG_DERIVED_INVALID] = 'Some derive_fields specifications are invalid $MNUM:\n';

		// MSG_INT_FORM_ERROR is sent in an Alert message and displayed
		// to the form user
		// Parameters: none
	$aMessages[MSG_INT_FORM_ERROR] = 'Internal form error';

		// MSG_OPTIONS_INVALID is sent in an Alert message when
		// a form's options settings are invalid.  This applies to
		// mail_options, filter_options, crm_options, and autorespond
		// Parameters:
		//	$OPT	the name of the options field
		// A list of errors is appended on separate lines
	$aMessages[MSG_OPTIONS_INVALID] = 'Some $OPT settings are undefined $MNUM:\n';

		// MSG_PLSWAIT_REDIR is shown to the user for a redirect
		// with JavaScript
		// Parameters: none
	$aMessages[MSG_PLSWAIT_REDIR] = 'Please wait while you are redirected...';

		// MSG_IFNOT_REDIR is shown to the user for a redirect
		// with JavaScript
		// Parameters:
		//	$URL	the URL to redirect to
	$aMessages[MSG_IFNOT_REDIR] = 'If you are not automatically redirected, '.
								  'please <a href="$URL">click here</a>.';

		// MSG_PEAR_OBJ is shown to the user if the PEAR Mail object
		// cannot be created
		// Parameters: none
	$aMessages[MSG_PEAR_OBJ] = 'Failed to create PEAR Mail object';

		// MSG_PEAR_ERROR is sent in an Alert message if the PEAR Mail processing
		// reports an error
		// Parameters:
		//	$MSG	the error message from PEAR
	$aMessages[MSG_PEAR_ERROR] = 'PEAR Mail error: $MSG';

		// MSG_NO_FOPT_ADDR is sent in an Alert message SendMailFOption is
		// specified in the form and no email address has been provided
		// Parameters: none
	$aMessages[MSG_NO_FOPT_ADDR] = 'You have specified "SendMailFOption" in your '.
								   'form, but there is no email address to use';

		// MSG_MORE_INFO is sent in an Alert message on a line by itself, just
		// before extra information about the FormMail processing that may have
		// led to the alert message
		// Parameters: none
	$aMessages[MSG_MORE_INFO] = 'More information:';

		// MSG_INFO_STOPPED is sent in an Alert message to say that extra
		// alert information has been suppressed because of potential security
		// problems with showing it.
		// Parameters: none
	$aMessages[MSG_INFO_STOPPED] = '(Extra alert information suppressed for '.
								   'security purposes. $MNUM)';

		// MSG_FM_ALERT is sent as the subject line of an Alert message
		// Parameters: none
	$aMessages[MSG_FM_ALERT] = 'FormMail alert';

		// MSG_FM_ERROR is sent as the subject line of an Alert message
		// Parameters: none
	$aMessages[MSG_FM_ERROR] = 'FormMail script error';

		// MSG_FM_ERROR_LINE is sent in an Alert message on a
		// separate line to introduce the actual error message
		// Parameters: none
	$aMessages[MSG_FM_ERROR_LINE] = 'The following error occurred in FormMail $MNUM:';

		// MSG_USERDATA_STOPPED is sent in an Alert message to say that the
		// user's data has been suppressed because of potential security
		// problems with showing it.
		// Parameters: none
	$aMessages[MSG_USERDATA_STOPPED] = '(User data suppressed for security '.
									   'purposes. $MNUM)';

		// MSG_FILTERED is sent in an Alert message to show what filter
		// has been used on the message
		// Parameters:
		//	$FILTER		the name of the filter
	$aMessages[MSG_FILTERED] = 'This alert has been filtered through "$FILTER" '.
							   'for security purposes.';

		// MSG_TEMPLATES is sent in an Alert message when a form tries
		// to use a template, but templates have not been configured in
		// formmail.php
		// Parameters: none
	$aMessages[MSG_TEMPLATES] = 'You must set either TEMPLATEDIR or TEMPLATEURL '.
							    'in formmail.php before you can specify '.
							    'templates in your forms.';

		// MSG_OPEN_TEMPLATE is sent in an Alert message when FormMail cannot
		// open a template file
		// Parameters:
		//	$NAME	the name of the template file
		//	$ERROR	information about the error
	$aMessages[MSG_OPEN_TEMPLATE] = 'Failed to open template "$NAME" $MNUM: $ERROR';

		// MSG_ERROR_PROC is shown to the user as part of an error
		// page.  This message introduces the error.
		// Parameters: none
	$aMessages[MSG_ERROR_PROC] = 'An error occurred while processing the '.
								 'form $MNUM.\n\n';

		// MSG_ALERT_DONE is shown to the user as part of an error
		// page if an Alert message has been sent to the website owner.
		// Parameters: none
	$aMessages[MSG_ALERT_DONE] = 'Our staff have been alerted to the error $MNUM.\n';

		// MSG_PLS_CONTACT is shown to the user as part of an error
		// page if an Alert message could *not* be sent to the website owner.
		// Parameters: none
	$aMessages[MSG_PLS_CONTACT] = 'Please contact us directly since this form '.
								  'is not working $MNUM.\n';

		// MSG_APOLOGY is shown to the user as part of an error
		// page as an apology for a problem with the form.
		// Parameters: none
	$aMessages[MSG_APOLOGY] = 'We apologize for any inconvenience this error '.
							  'may have caused.';

		// MSG_ABOUT_FORMMAIL is shown to the user at the foot of pages
		// generated by FormMail (e.g. the default "Thanks" page and default
		// error page).
		// Parameters:
		//	$FM_VERS	the FormMail version number
		//	$TECTITE	www.tectite.com
	$aMessages[MSG_ABOUT_FORMMAIL] = 'Your form submission was processed by '.
							  		 '($FM_VERS), available from '.
									 '<a href="http://$TECTITE/">$TECTITE</a>.';

		// MSG_PREG_FAILED is sent in an Alert message if the TectiteCRM
		// system failed to return the expected result.
		// Parameters: none
	$aMessages[MSG_PREG_FAILED] = 'preg_match_all failed in FindCRMFields';

		// MSG_URL_INVALID is sent in an Alert message if the specified
		// URL for TectiteCRM is not valid according to the TARGET_URLS
		// configuration setting
		// Parameters:
		//	$URL		the invalid URL
	$aMessages[MSG_URL_INVALID] = 'The URL "$URL" to access the Customer '.
								  'Relationship Management System is not valid '.
								  '(see TARGET_URLS in formmail.php)';

		// MSG_URL_OPEN is sent in an Alert message if the specified
		// URL for TectiteCRM cannot be opened
		// Parameters:
		//	$URL	the invalid URL
		//	$ERROR	information about the error
	$aMessages[MSG_URL_OPEN] = 'Failed to open Customer Relationship '.
							   'Management System URL "$URL" $MNUM: $ERROR';

		// MSG_CRM_FAILED is sent in an Alert message if the TectiteCRM
		// system doesn't return an OK message
		// Parameters:
		//	$URL	the invalid URL
		//	$MSG	more information
	$aMessages[MSG_CRM_FAILED] = 'Failure report from Customer Relationship '.
								 'Management System (url="$URL") $MNUM: $MSG';

		// MSG_CRM_FORM_ERROR is shown to the user if the information
		// passed to TectiteCRM was not accepted
		// Parameters: none
	$aMessages[MSG_CRM_FORM_ERROR] = 'Your form submission was not accepted';

		// MSG_AND is shown to the user; it shows two items separated
		// by "and"
		// Parameters:
		//	$ITEM1		the first item
		//	$ITEM2		the second item
	$aMessages[MSG_AND] = '"$ITEM1" and "$ITEM2"';

		// MSG_OR is shown to the user; it shows two items separated
		// by "or"
		// Parameters:
		//	$ITEM1		the first item
		//	$ITEM2		the second item
	$aMessages[MSG_OR] = '"$ITEM1" or "$ITEM2"';

		// MSG_NOT_BOTH is shown to the user; it shows two items that must
		// be specified together
		// Parameters:
		//	$ITEM1		the first item
		//	$ITEM2		the second item
	$aMessages[MSG_NOT_BOTH] = 'not both "$ITEM1" and "$ITEM2"';

		// MSG_XOR is shown to the user; it shows two items that must
		// not be specified together
		// Parameters:
		//	$ITEM1		the first item
		//	$ITEM2		the second item
	$aMessages[MSG_XOR] = '"$ITEM1" or "$ITEM2" (but not both)';

		// MSG_IS_SAME_AS is shown to the user; it shows two items that must
		// not be the same value
		// Parameters:
		//	$ITEM1		the first item
		//	$ITEM2		the second item
	$aMessages[MSG_IS_SAME_AS] = '"$ITEM1" is the same as "$ITEM2"';

		// MSG_IS_NOT_SAME_AS is shown to the user; it shows two items that must
		// be the same value
		// Parameters:
		//	$ITEM1		the first item
		//	$ITEM2		the second item
	$aMessages[MSG_IS_NOT_SAME_AS] = '"$ITEM1" is not the same as "$ITEM2"';

		// MSG_REQD_OPER is sent in an Alert message when an unknown
		// operator has been used in a "required" specification
		// Parameters:
		//	$OPER		the unknown operator
	$aMessages[MSG_REQD_OPER] = 'Operator "$OPER" is not valid for "required"';

		// MSG_PAT_FAILED is sent in an Alert message when a "conditions" pattern
		// match has not matched anything (this isn't necessarily an error)
		// Parameters:
		//	$OPER		the "conditions" operator
		//	$PAT		the "conditions" pattern
		//	$VALUE		the value that was searched
	$aMessages[MSG_PAT_FAILED] = 'Pattern operator "$OPER" failed: pattern '.
								 '"$PAT", value searched was "$VALUE".';

		// MSG_COND_OPER is sent in an Alert message when a "conditions"
		// operator is not value
		// Parameters:
		//	$OPER		the "conditions" operator
	$aMessages[MSG_COND_OPER] = 'Operator "$OPER" is not valid for "conditions"';

		// MSG_INV_COND is sent in an Alert message when a "conditions"
		// field is not valid
		// Parameters:
		//	FLD		the field name
	$aMessages[MSG_INV_COND] = 'Invalid "conditions" field "$FLD" - not a string or array.';

		// MSG_COND_CHARS is sent in an Alert message when a "conditions"
		// field is missing the mandatory first 2 characters (the separators)
		// Parameters:
		//	FLD		the field name
		//	COND	the conditions field value
	$aMessages[MSG_COND_CHARS] = 'The conditions field "$FLD" is not valid. '.
								 'You must provide the two separator '.
								 'characters at the beginning. You had "$COND".';

		// MSG_COND_INVALID is sent in an Alert message when a "conditions"
		// field has the wrong format
		// Parameters:
		//	FLD		the field name
		//	COND	the conditions field value
		//	SEP		the internal separator character for the field.
	$aMessages[MSG_COND_INVALID] = 'The conditions field "$FLD" is not valid. '.
								   'There must be at least 5 components '.
								   'separated by "$SEP". Your value was "$COND".';

		// MSG_COND_TEST_LONG is sent in an Alert message when a "conditions"
		// TEST value has too many components
		// Parameters:
		//	FLD		the field name
		//	COND	the conditions field value
		//	SEP		the list separator character for the field.
	$aMessages[MSG_COND_TEST_LONG] = 'Field "$FLD" has too many components for '.
									 'a "TEST" command: "$COND".\nAre you missing '.
									 'a "$SEP"?';

		// MSG_COND_IF_SHORT is sent in an Alert message when a "conditions"
		// IF value has too few components
		// Parameters:
		//	FLD		the field name
		//	COND	the conditions field value
		//	SEP		the internal separator character for the field.
	$aMessages[MSG_COND_IF_SHORT] = 'Field "$FLD" has too few components for '.
								    'an "IF" command: "$COND".\nThere must be '.
								    'at least 6 components separated by "$SEP"';

		// MSG_COND_IF_LONG is sent in an Alert message when a "conditions"
		// IF value has too many components
		// Parameters:
		//	FLD		the field name
		//	COND	the conditions field value
		//	SEP		the list separator character for the field.
	$aMessages[MSG_COND_IF_LONG] = 'Field "$FLD" has too many components for '.
							   	   'an "IF" command: "$COND".\nAre you missing '.
								   'a "$SEP"?';

		// MSG_COND_UNK is sent in an Alert message when a "conditions"
		// value has an unknown command
		// Parameters:
		//	FLD		the field name
		//	COND	the conditions field value
		//	CMD		the unknown command
	$aMessages[MSG_COND_UNK] = 'Field "$FLD" has an unknown command word '.
							   '"$CMD": "$COND".';

		// MSG_MISSING is sent in an Alert message when
		// a socket filter is incorrectly defined
		// Parameters:
		//	ITEM	the missing item
	$aMessages[MSG_MISSING] = 'Missing "$ITEM"';

		// MSG_NEED_ARRAY is sent in an Alert message when
		// a socket filter is incorrectly defined
		// Parameters:
		//	ITEM	the item that should be an array
	$aMessages[MSG_NEED_ARRAY] = '"$ITEM" must be an array';

		// MSG_SUBM_FAILED is shown to the user when an internal error
		// as occurred and that error is not to be shown
		// Parameters: none
	$aMessages[MSG_SUBM_FAILED] = 'Your form submission has failed due to '.
								  'an error on our server.';

		// MSG_FILTER_WRONG is sent in an Alert message when
		// a socket filter is incorrectly defined
		// Parameters:
		//	FILTER	the filter name
		//	ERRORS	a string containing a list of errors
	$aMessages[MSG_FILTER_WRONG] = 'Filter "$FILTER" is not properly defined: '.
								   '$ERRORS';

		// MSG_FILTER_CONNECT is sent in an Alert message when FormMail
		// cannot connect to a socket filter
		// Parameters:
		//	FILTER	the filter name
		//	SITE	the site
		//	ERRNUM	socket error number
		//	ERRSTR	socket error message
	$aMessages[MSG_FILTER_CONNECT] = 'Could not connect to site "$SITE" '.
								     'for filter "$FILTER" ($ERRNUM): $ERRSTR';

		// MSG_FILTER_PARAM is sent in an Alert message when a socket
		// filter has an invalid parameter specification
		// Parameters:
		//	FILTER	the filter name
		//	NUM		parameter number
		//	NAME	parameter name
	$aMessages[MSG_FILTER_PARAM] = 'Filter "$FILTER" has invalid parameter '.
								   '#$NUM: no "$NAME"';

		// MSG_FILTER_OPEN_FILE is sent in an Alert message when a socket
		// filter cannot open the required file
		// Parameters:
		//	FILTER	the filter name
		//	FILE	the file that could not be opened
		//	ERROR	the error message
	$aMessages[MSG_FILTER_OPEN_FILE] = 'Filter "$FILTER" cannot open file '.
								   	   '"$FILE": $ERROR';

		// MSG_FILTER_FILE_ERROR is sent in an Alert message when a socket
		// filter gets an error message during reading a file
		// Parameters:
		//	FILTER	the filter name
		//	FILE	the file that could not be opened
		//	ERROR	the error message
		//	NLINES	the number of lines that were read successfully
	$aMessages[MSG_FILTER_FILE_ERROR] = 'Filter "$FILTER": read error on file '.
 								   	    '"$FILE" after $NLINES lines: $ERROR';

		// MSG_FILTER_READ_ERROR is sent in an Alert message when a socket
		// filter gets an error during reading from the socket
		// Parameters:
		//	FILTER	the filter name
		//	ERROR	the error message
	$aMessages[MSG_FILTER_READ_ERROR] = 'Filter "$FILTER" failed: read error: '.
 								   	    '$ERROR';

		// MSG_FILTER_NOT_OK is sent in an Alert message when a socket
		// filter fails to return the agreed __OK__ indicator
		// Parameters:
		//	FILTER	the filter name
		//	DATA	the data returned from the filter
	$aMessages[MSG_FILTER_NOT_OK] = 'Filter "$FILTER" failed (missing '.
 								   	'__OK__ line): $DATA';

		// MSG_FILTER_UNK is sent in an Alert message
		// when an unknown filter is specified by a form
		// Parameters:
		//	FILTER	the filter name
	$aMessages[MSG_FILTER_UNK] = 'Unknown filter "$FILTER"';

		// MSG_FILTER_CHDIR is sent in an Alert message
		// when FormMail cannot change to the filter's directory
		// Parameters:
		//	FILTER	the filter name
		//	DIR		the directory name
		//	ERROR	an error message from the system
	$aMessages[MSG_FILTER_CHDIR] = 'Cannot chdir to "$DIR" to run filter '.
								   '"$FILTER": $ERROR';

		// MSG_FILTER_NOTFOUND is sent in an Alert message
		// when FormMail cannot execute the filter
		// Parameters:
		//	FILTER	the filter name
		//	CMD		the command line being executed
		//	ERROR	an error message from the system
	$aMessages[MSG_FILTER_NOTFOUND] = 'Cannot execute filter "$FILTER" with '.
									  'command "$CMD": $ERROR';

		// MSG_FILTER_ERROR is sent in an Alert message
		// when a filter returns a non-zero status
		// Parameters:
		//	FILTER	the filter name
		//	ERROR	an error message from the system
		//	STATUS	the status return from the command
	$aMessages[MSG_FILTER_ERROR] = 'Filter "$FILTER" failed (status $STATUS): '.
								   '$ERROR';

		// MSG_FLD_NOTFOUND is sent as part of an Alert message
		// when a template refers to a non-existent form field
		// Parameters:
		//	FIELD	the field name
	$aMessages[MSG_FLD_NOTFOUND] = '"$FIELD" is not a field submitted from the form';

		// MSG_TEMPLATE_ERRORS is sent as part of an Alert message
		// when a template has generated some errors.  The message
		// should end with a new line and the actual errors are
		// output after it.
		// Parameters:
		//	NAME	the template name
	$aMessages[MSG_TEMPLATE_ERRORS] = 'Template "$NAME" caused the '.
									  'following errors $MNUM:\n';

		// MSG_TEMPLATE_FAILED is sent in an Alert message
		// when processing a template has failed.
		// Parameters:
		//	NAME	the template name
	$aMessages[MSG_TEMPLATE_FAILED] = 'Failed to process template "$NAME"';

		// MSG_MIME_PREAMBLE is sent in the preamble of MIME emails
		// Parameters: none
	$aMessages[MSG_MIME_PREAMBLE] = '(Your mail reader should not show this '.
									'text.\nIf it does you may need to '.
									'upgrade to more modern software.)';

		// MSG_MIME_HTML is sent in the preamble of HTML emails
		// Parameters:
		//	NAME	the template name
	$aMessages[MSG_MIME_HTML] = 'This message has been generated by FormMail '.
								'using an HTML template\ncalled "$NAME". The '.
								'raw text of the form results\nhas been '.
								'included below, but your mail reader should '.
								'display the HTML\nversion only (unless it\'s '.
								'not capable of doing so).';

		// MSG_FILE_OPEN_ERROR is sent in an Alert message when FormMail
		// cannot open a file
		// Parameters:
		//	NAME	the file name
		//	TYPE	the type of file
		//	ERROR	the system error message
	$aMessages[MSG_FILE_OPEN_ERROR] = 'Failed to open $TYPE file "$NAME": $ERROR';

		// MSG_ATTACH_DATA is sent in an Alert message when the file
		// attachment through 'data' has gone wrong.
		// Parameters: none
	$aMessages[MSG_ATTACH_DATA] = 'Internal error: AttachFile requires '.
								  '"tmp_name" or "data"';

		// MSG_PHP_HTML_TEMPLATES is sent in an Alert message when an
		// HTML template is used but the PHP version is too old.
		// Parameters:
		//	$PHPVERS	the current PHP version
	$aMessages[MSG_PHP_HTML_TEMPLATES] = 'HTMLTemplate option is only supported '.
									 'with PHP version 4.0.5 or above.  Your '.
									 'server is running version $PHPVERS.';

		// MSG_PHP_FILE_UPLOADS is sent in an Alert message when
		// file upload is used but the PHP version is too old.
		// Parameters:
		//	$PHPVERS	the current PHP version
	$aMessages[MSG_PHP_FILE_UPLOADS] = 'For security reasons, file upload is only '.
								   'allowed with PHP version 4.0.3 or above. '.
								   'Your server is running version $PHPVERS.';

		// MSG_FILE_UPLOAD is sent in an Alert message when
		// file upload is attempted but FormMail is not configured to allow
		// it
		// Parameters: none
	$aMessages[MSG_FILE_UPLOAD] = 'File upload attempt ignored';

		// MSG_FILE_UPLOAD_ATTACK is sent in an Alert message when
		// possible file upload attack is detected
		// Parameters:
		//	NAME	file name
		//	TEMP	temporary file name
        //  FLD     name of the file upload field
	$aMessages[MSG_FILE_UPLOAD_ATTACK] = 'Possible file upload attack '.
										 'detected: field="$FLD", name="$NAME" '.
                                         'temp name="$TEMP"';

		// MSG_PHP_PLAIN_TEMPLATES is sent in an Alert message when a
		// Plain template is used but the PHP version is too old.
		// Parameters:
		//	$PHPVERS	the current PHP version
	$aMessages[MSG_PHP_PLAIN_TEMPLATES] = 'PlainTemplate option is only supported '.
									 'with PHP version 4.0.5 or above.  Your '.
									 'server is running version $PHPVERS.';

		// MSG_ATTACH_NAME is sent in an Alert message when a
		// the form uses the Attach feature without specifying a file name
		// Parameters: none
	$aMessages[MSG_ATTACH_NAME] = 'filter_options: Attach must contain a name '.
								  '(e.g. Attach=data.txt)';

		// MSG_PHP_BCC is sent in an Alert message when a
		// the form uses the BCC feature and the PHP version may not support it
		// Parameters:
		//	$PHPVERS	the current PHP version
	$aMessages[MSG_PHP_BCC] = 'Warning: BCC is probably not supported on your '.
							  'PHP version ($PHPVERS)';

		// MSG_CSVCOLUMNS is sent in an Alert message when a csvcolumns field
		// is not correct
		// Parameters:
		//	$VALUE	the csvcolumns field value
	$aMessages[MSG_CSVCOLUMNS] = 'The "csvcolumns" setting is not '.
								 'valid: "$VALUE"';

		// MSG_CSVFILE is sent in an Alert message when a csvfile field
		// is not correct
		// Parameters:
		//	$VALUE	the csvfile field value
	$aMessages[MSG_CSVFILE] = 'The "csvfile" setting is not valid: "$VALUE"';

		// MSG_TARG_EMAIL_PAT_START is sent in an Alert message when a
		// $TARGET_EMAIL pattern is insecure because of a missing '^'
		// at the beginning
		// Parameters:
		//	$PAT	the pattern
	$aMessages[MSG_TARG_EMAIL_PAT_START] = 'Warning: Your TARGET_EMAIL pattern '.
										   '"$PAT" is missing a ^ at the '.
										   'beginning.';

		// MSG_TARG_EMAIL_PAT_END is sent in an Alert message when a
		// $TARGET_EMAIL pattern is insecure because of a missing '$'
		// at the end
		// Parameters:
		//	$PAT	the pattern
	$aMessages[MSG_TARG_EMAIL_PAT_END] = 'Warning: Your TARGET_EMAIL pattern '.
										 '"$PAT" is missing a $ at the end.';

		// MSG_CONFIG_WARN is sent in an Alert message when the FormMail
		// configuration may have some problems.  The messages are
		// passed on separate lines, so the line terminations below
		// are important.
		// Parameters:
		//	$MESGS	lines of messages
	$aMessages[MSG_CONFIG_WARN] = 'The following potential problems were found '.
								  'in your configuration:\n$MESGS\n\n'.
								  'These are not necessarily errors, but you '.
								  'should review the documentation\n'.
								  'inside formmail.php.  If you are sure your '.
								  'configuration is correct\n'.
								  'you can disable the above messages by '.
								  'changing the CONFIG_CHECK settings.';

		// MSG_PHP_AUTORESP is sent in an Alert message when the PHP version
		// does not support autoresponding
		// Parameters:
		//	$PHPVERS	current PHP version
	$aMessages[MSG_PHP_AUTORESP] = 'Autorespond is only supported with PHP '.
								   'version 4.0.5 or above.  Your server is '.
								   'running version $PHPVERS.';

		// MSG_ALERT is the test alert message (formmail.php?testalert=1)
		// Parameters:
		//	$LANG				the language ID
		//	$PHPVERS			PHP version
		//	$FM_VERS			FormMail version
		//	$SERVER				server type
		//	$DOCUMENT_ROOT		PHP's DOCUMENT_ROOT value
		//	$SCRIPT_FILENAME	PHP's SCRIPT_FILENAME value
		//	$PATH_TRANSLATED	PHP's PATH_TRANSLATED value
		//	$REAL_DOCUMENT_ROOT	the REAL_DOCUMENT_ROOT value
	$aMessages[MSG_ALERT] =	'This is a test alert message $MNUM\n'.
							'Loaded language is $LANG\n'.
							'PHP version is $PHPVERS\n'.
							'FormMail version is $FM_VERS\n'.
							'Server type: $SERVER\n'.
							'\n'.
							'DOCUMENT_ROOT: $DOCUMENT_ROOT\n'.
							'SCRIPT_FILENAME: $SCRIPT_FILENAME\n'.
							'PATH_TRANSLATED: $PATH_TRANSLATED\n'.
							'REAL_DOCUMENT_ROOT: $REAL_DOCUMENT_ROOT';

		// MSG_NO_DEF_ALERT is displayed if you use the testalert feature
		// and no DEF_ALERT setting has been provided.
		// Parameters: none
	$aMessages[MSG_NO_DEF_ALERT] = 'No DEF_ALERT value has been set.';

		// MSG_TEST_SENT is displayed if when use the testalert feature
		// Parameters: none
	$aMessages[MSG_TEST_SENT] = 'Test message sent.  Check your email.';

		// MSG_TEST_FAILED is displayed if when use the testalert feature
		// and the mail sending fails.
		// Parameters: none
	$aMessages[MSG_TEST_FAILED] = 'FAILED to send alert message.  Check your '.
								  'server error logs.';

		// MSG_NO_DATA_PAGE is the page that's displayed if the user
		// just opens the URL to FormMail directly.
		// Parameters: none
	$aMessages[MSG_NO_DATA_PAGE] =	'This URL is a Form submission program.\n'.
									'It appears the form is not working '.
									'correctly as there was no data found.\n'.
									'You\'re not supposed to browse to this '.
									'URL; it should be accessed from a form.';

		// MSG_REQD_ERROR is displayed to the user as a default error
		// message when they haven't supplied some required fields
		// Parameters: none
	$aMessages[MSG_REQD_ERROR] = 'The form required some values that you '.
								 'did not seem to provide.';

		// MSG_COND_ERROR is displayed to the user as a default error
		// message when some form conditions have failed
		// Parameters: none
	$aMessages[MSG_COND_ERROR] = 'Some of the values you provided are not valid.';

		// MSG_CRM_FAILURE is displayed to the user when submission
		// to the CRM has failed.
		// Parameters: none
	$aMessages[MSG_CRM_FAILURE] = 'The form submission did not succeed due to '.
								  'a CRM failure.';

		// MSG_FOPTION_WARN is sent in an Alert message when the form
		// uses the superseded SendMailFOption feature
		// Parameters:
		//	$LINE	line number for SENDMAIL_F_OPTION
	$aMessages[MSG_FOPTION_WARN] = 'Warning: You\'ve used SendMailFOption in '.
								   '"mail_options" in your form. This has been '.
								   'superseded with a configuration setting '.
								   'inside formmail.php.  Please update your '.
								   'formmail.php configuration (look for '.
								   'SENDMAIL_F_OPTION on line $LINE) and set '.
								   'it to "true", then remove SendMailFOption '.
								   'from your form(s).';

		// MSG_NO_ACTIONS is sent in an Alert message when there is no
		// action to perform or email address to send to
		// Parameters: none
	$aMessages[MSG_NO_ACTIONS] = 'The form has an internal error - no actions '.
								 'or recipients were specified.';

		// MSG_NO_RECIP is sent in an Alert message when there are no
		// valid recipients to send to
		// Parameters: none
	$aMessages[MSG_NO_RECIP] = 'The form has an internal error - no valid '.
							   'recipients were specified.';

		// MSG_INV_EMAIL is sent in an Alert message when there are errors
		// in the email addresses specified in the form
		// Parameters:
		//	$ERRORS		list of errors
	$aMessages[MSG_INV_EMAIL] = 'Invalid email addresses were specified '.
								'in the form $MNUM:\n$ERRORS';

    	// MSG_FAILED_SEND is sent in an Alert message when the mail sending fails.
		// Parameters: none
	$aMessages[MSG_FAILED_SEND] = 'Failed to send email';

    	// MSG_ARESP_EMAIL is sent in an Alert message when
		// no email address has been specified for an autoreponse
		// Parameters: none
	$aMessages[MSG_ARESP_EMAIL] = 'No "email" field was found. Autorespond '.
								  'requires the submitter\'s email address.';

    	// MSG_ARESP_SUBJ is the default subject for the auto response email
		// Parameters: none
	$aMessages[MSG_ARESP_SUBJ] = 'Your form submission';

    	// MSG_LOG_NO_VERIMG is written to the auto respond log file
		// if no VerifyImgString session variable was found
		// Parameters: none
	$aMessages[MSG_LOG_NO_VERIMG] = 'No VerifyImgString in session';

    	// MSG_ARESP_NO_AUTH is shown to the user
		// if no VerifyImgString session variable was found
		// Parameters: none
	$aMessages[MSG_ARESP_NO_AUTH] = 'Failed to obtain authorization to send '.
                                    'you email. This is probably a fault on '.
                                    'the server.';

    	// MSG_LOG_NO_MATCH is written to the auto respond log file
		// if the user's entry did not match the image verification
		// Parameters: none
	$aMessages[MSG_LOG_NO_MATCH] = 'User did not match image';

    	// MSG_ARESP_NO_MATCH is shown to the user
		// if the user's entry did not match the image verification
		// Parameters: none
	$aMessages[MSG_ARESP_NO_MATCH] = 'Your entry did not match the image';

    	// MSG_LOG_FAILED is written to the auto respond log file
		// if the autoresponding failed
		// Parameters: none
	$aMessages[MSG_LOG_FAILED] = 'Failed';

    	// MSG_ARESP_FAILED is sent in an Alert message
		// if the autoresponding failed
		// Parameters: none
	$aMessages[MSG_ARESP_FAILED] = 'Autoresponder failed';

    	// MSG_LOG_OK is written to the auto respond log file
		// if the autoresponding succeeded
		// Parameters: none
	$aMessages[MSG_LOG_OK] = 'OK';

		// MSG_THANKS_PAGE is the default page that's displayed if the
		// submission is successful
		// Parameters: none
	$aMessages[MSG_THANKS_PAGE] = 'Thanks!  We\'ve received your information '.
								  'Check your email for the information you requested. We\'ll be in '.
								  'contact with you soon.';

		// MSG_LOAD_MODULE is sent in an alert message if a module
        // could not be loaded.
		// Parameters:
        //  $FILE    the file name
        //  $ERROR   the error message
	$aMessages[MSG_LOAD_MODULE] = 'Cannot load module from file \'$FILE\': $ERROR';

		// MSG_LOAD_FMCOMPUTE is sent in an alert message if the form
        // specifies at least one "fmcompute" field and the FMCompute
        // module cannot be loaded.
		// Parameters:
        //  $FILE    the file name
        //  $ERROR   the error message
	$aMessages[MSG_LOAD_FMCOMPUTE] = 'Cannot load FMCompute module from file '.
                                        '\'$FILE\': $ERROR';

		// MSG_REGISTER_MODULE is sent in an alert message if a module
        // could not register with FMCompute
		// Parameters:
        //  $NAME    the name of the module
        //  $ERROR   the error message
	$aMessages[MSG_REGISTER_MODULE] = 'Cannot register module $NAME with '.
                                        'FMCompute: $ERROR';


		// MSG_COMP_PARSE is sent in an alert message if a parse error
        // occurs in an fmcompute field
		// Parameters:
        //  $CODE    the code with an error
        //  $ERRORS  the error messages
	$aMessages[MSG_COMP_PARSE] = 'These parse errors occurred in the following '.
                                    'code:\n$ERRORS\n$CODE';

		// MSG_COMP_REG_DATA is sent in an alert message if FormMail cannot
        // register a data field with the FMCompute module
		// Parameters:
        //  $NAME    the field name
        //  $ERROR  the error message
	$aMessages[MSG_COMP_REG_DATA] = 'Failed to register data field \'$NAME\': '.
                                    '$ERROR';

		// MSG_COMP_ALERT is sent in an alert message if the FMCompute
        // module has generated some alert messages.
		// Parameters:
        //  $ALERTS  the alerts
	$aMessages[MSG_COMP_ALERT] = 'The following alert messages were reported '.
                                'from the FMCompute module: $ALERTS';

		// MSG_COMP_DEBUG is sent in an alert message if the FMCompute
        // module has generated some debug messages.
		// Parameters:
        //  $DEBUG  the alerts
	$aMessages[MSG_COMP_DEBUG] = 'The following debug messages were reported '.
                                'from the FMCompute module: $DEBUG';

		// MSG_COMP_EXEC is sent in an alert message if the FMCompute
        // module has generated some error messages during execution
		// Parameters:
        //  $ERRORS  the errors
	$aMessages[MSG_COMP_EXEC] = 'The following error messages were reported '.
                                'from the FMCompute module: $ERRORS';

		// MSG_TEMPL_ALERT is sent in an alert message if Advanced Template
        // Processing has generated some alert messages.
		// Parameters:
        //  $ALERTS  the alerts
	$aMessages[MSG_TEMPL_ALERT] = 'The following alert messages were reported '.
                                'from the Advanced Template Processor: $ALERTS';

		// MSG_TEMPL_DEBUG is sent in an alert message if Advanced Template
        // Processing has generated some debug messages.
		// Parameters:
        //  $DEBUG  the alerts
	$aMessages[MSG_TEMPL_DEBUG] = 'The following debug messages were reported '.
                                'from the Advanced Template Processor: $DEBUG';

		// MSG_TEMPL_PROC is sent in an alert message if Advanced Template Processing
        // has generated some error messages during processing
		// Parameters:
        //  $ERRORS  the errors
	$aMessages[MSG_TEMPL_PROC] = 'The following error messages were reported '.
                                'from the Advanced Template Processor: $ERRORS';

		// MSG_REG_FMCOMPUTE is sent in an Alert message when FormMail
        // cannot register an external function with FMCompute.
		// Parameters:
		//	FUNC    the function that could not be registered
        //  ERROR   the error message
	$aMessages[MSG_REG_FMCOMPUTE] = 'Cannot register function "$FUNC" with '.
                                    'FMCompute: $ERROR';


		// MSG_USER_ERRORS is shown as part of a user error when an FMCompute
        // has called the "UserError" function one or more times.
		// Parameters:
		//	NONE
	$aMessages[MSG_USER_ERRORS] = 'One or more errors occurred in your form submission';


		// MSG_CALL_PARAM_COUNT is sent in an alert when a call to a FormMail
        // function from FMCompute has the wrong number of parameters
		// Parameters:
		//	FUNC    the function name
        //  COUNT   the actual number of parameters passed
	$aMessages[MSG_CALL_PARAM_COUNT] = 'FMCompute called FormMail function '.
                                       '\'$FUNC\' with wrong number of '.
                                       'parameters: $COUNT';

		// MSG_CALL_UNK_FUNC is sent in an alert when FMCompute calls an
        // unknown FormMail function
		// Parameters:
		//	FUNC    the function name
	$aMessages[MSG_CALL_UNK_FUNC] = 'FMCompute called unknown FormMail function '.
                                       '\'$FUNC\'';

		// MSG_SAVE_FILE is sent in an alert when saving a file to
        // the server has failed
		// Parameters:
		//	FILE    the source file name (usually a temporary file name)
        //  DEST    the destination file name
        //  ERR     the error message
	$aMessages[MSG_SAVE_FILE] = 'Failed to save file \'$FILE\' to \'$DEST\': $ERR';

		// MSG_SAVE_FILE_EXISTS is sent as part of an alert when saving a file to
        // the repository ($FILE_REPOSITORY) has failed because the file
        // already exists and FILE_OVERWRITE is set to false.
		// Parameters:
		//	FILE    the destination file name
	$aMessages[MSG_SAVE_FILE_EXISTS] = 'Cannot save file to repository as this would '.
                                        'overwrite \'$FILE\' and you have '.
                                        'set FILE_OVERWRITE to false.';

		// MSG_CHMOD is sent in an alert when changing the protection
        // mode of a file to has failed
		// Parameters:
		//	FILE    the file name
        //  MODE    the mode
        //  ERR     the error message
	$aMessages[MSG_CHMOD] = 'Failed to change protection mode of file \'$FILE\' '.
                            'to $MODE: $ERR';

    	// MSG_VERIFY_MISSING is shown to the user image verification string
        // was not found
		// Parameters: none
	$aMessages[MSG_VERIFY_MISSING] = 'Image verification string missing. This'.
                                     ' is probably a fault on the server.';

    	// MSG_VERIFY_MATCH is shown to the user
		// if the user's entry did not match the image verification for the
        // imgverify option
		// Parameters: none
	$aMessages[MSG_VERIFY_MATCH] = 'Your entry did not match the image';

		// MSG_FILE_NAMES_INVALID is sent in an Alert message when
		// a form's file_names setting has errors
		// Parameters: none
		// A list of errors is appended on separate lines
	$aMessages[MSG_FILE_NAMES_INVALID] = 'Some file_names specifications are invalid $MNUM:\n';

		// MSG_FILE_NAMES_NOT_FILE is sent in an Alert message when
		// a form's file_names setting refers to a file field that doesn't
        // exist
		// Parameters:
        //      NAME    the name of the file field that doesn't exist
	$aMessages[MSG_FILE_NAMES_NOT_FILE] = 'Your file_names specification has '.
                                          'an error. \'$NAME\' is not the name '.
                                          'of a file upload field\n';

		// MSG_NEXT_PLUS_GOOD is sent in an alert message if the form is
        // ambiguous and specifies both "next_form" and "good_url" or
        // "good_template"
		// Parameters:
        //  $WHICH  the "good_" field that was specified
	$aMessages[MSG_NEXT_PLUS_GOOD] = 'The form has specified both "next_form" '.
                                    'and "$WHICH" fields - the action to '.
                                    'to perform is ambiguous';

		// MSG_MULTIFORM is sent in an Alert message when a form tries
		// to use a multi-form template, but templates have not been configured in
		// formmail.php
		// Parameters: none
	$aMessages[MSG_MULTIFORM] = 'You must set either MULTIFORMDIR or MULTIFORMURL '.
							    'in formmail.php before you can use '.
							    'multi-page forms.';

		// MSG_MULTIFORM_FAILED is sent in an Alert message
		// when processing a multi-page form template has failed.
		// Parameters:
		//	NAME	the template name
	$aMessages[MSG_MULTIFORM_FAILED] = 'Failed to process multi-page form template "$NAME"';

		// MSG_NEED_THIS_FORM is sent in an Alert message
		// when a multi-page form does not specify the "this_form" field.
		// Parameters:
		//	none
	$aMessages[MSG_NEED_THIS_FORM] = 'Multi-page forms require "this_form" field';

		// MSG_NO_PHP_SELF is sent in an Alert message
		// when FormMail requires the "PHP_SELF" server variable and PHP is not
        // providing it.
		// Parameters:
		//	none
	$aMessages[MSG_NO_PHP_SELF] = 'PHP on the server is not providing "PHP_SELF"';

		// MSG_RETURN_URL_INVALID is sent in an Alert message
		// when "this_form" is not a valid return URL.  This occurs for
        // multi-page forms.
		// Parameters:
		//	URL     the invalid URL
	$aMessages[MSG_RETURN_URL_INVALID] = 'Return URL "$URL" is not valid';

		// MSG_GO_BACK is sent in an Alert message
		// when "multi_go_back" has been submitted but this isn't part of a
        // multi-page form.
		// Parameters:
		//	none
	$aMessages[MSG_GO_BACK] = 'Cannot "go back" if not in a multi-page form '.
                              'sequence or at the first page of the form '.
                              'sequence';

		// MSG_OPEN_URL is sent in an Alert message when a URL cannot
        // be opened.
		// Parameters:
		//	URL     the invalid URL
        //  ERROR   error message
	$aMessages[MSG_OPEN_URL] = 'Cannot open URL "$URL": $ERROR';

		// MSG_CANNOT_RETURN is sent in an Alert message when an invalid return
        // request is made in a multi-page form sequence.
		// Parameters:
		//	TO          the requested page index
        //  TOPINDEX    the top page index
	$aMessages[MSG_CANNOT_RETURN] = 'Cannot return to page $TO.  The top page '.
                                    'index is $TOPINDEX';

		// MSG_ATTACK_DETECTED is sent in an Alert message when an attack on
        // the server has been detected
		// Parameters:
		//	ATTACK      name or description of the attack
        //  INFO        more information about the attack
	$aMessages[MSG_ATTACK_DETECTED] = 'Server attack "$ATTACK" detected. '.
                                      'Your server is safe as FormMail is '.
                                      'invulnerable to this attack.  You can '.
                                      'disable these messages by setting '.
                                      'ALERT_ON_ATTACK_DETECTION to false '.
                                      'in FormMail\'s configuration section.'.
                                      '\nMore information:\n$INFO';

		// MSG_ATTACK_PAGE is the contents of the browser page displayed to the
        // user when an attack is detected
		// Parameters:
		//	none
	$aMessages[MSG_ATTACK_PAGE] = 'Your form submission has been rejected '.
                                  'as it appears to be an abuse of our server.';

		// MSG_ATTACK_MIME_INFO is the contents of the INFO parameter
        // to the MSG_ATTACK_DETECTED message for the MIME attack
		// Parameters:
		//	FLD     name of the field
        //  CONTENT the invalid content found in the field
	$aMessages[MSG_ATTACK_MIME_INFO] = 'The field "$FLD" contained invalid '.
                                       'content "$CONTENT"';

		// MSG_ATTACK_DUP_INFO is the contents of the INFO parameter
        // to the MSG_ATTACK_DETECTED message for the Duplicate Data attack
		// Parameters:
		//	FLD1     name of the first field
		//	FLD2     name of the second field
	$aMessages[MSG_ATTACK_DUP_INFO] = 'The fields "$FLD1" and "$FLD2" contained '.
                                      'duplicate data';

		// MSG_ATTACK_SPEC_INFO is the contents of the INFO parameter
        // to the MSG_ATTACK_DETECTED message for the Special Field attack
		// Parameters:
		//	FLD     name of the special field
	$aMessages[MSG_ATTACK_SPEC_INFO] = 'Special field "$FLD" contained an email address';

		// MSG_NEED_SCRATCH_PAD is an alert message when processing requires
        // SCRATCH_PAD configuration for file upload processing.  This occurs
        // when you upload files in pages of a multi page form sequence.
		// Parameters:
		//	none
	$aMessages[MSG_NEED_SCRATCH_PAD] = 'You need to set SCRATCH_PAD in the '.
                                        'configuration section to process '.
                                        'uploaded files.';

		// MSG_OPEN_SCRATCH_PAD is an alert message when the SCRATCH_PAD
        // directory cannot be opened for cleanup.
		// Parameters:
		//	DIR     name of the directory
        //  ERR     more error information
	$aMessages[MSG_OPEN_SCRATCH_PAD] = 'Cannot open SCRATCH_PAD directory '.
                                        '"$DIR".  Open failed: $ERR';

		// MSG_NO_NEXT_NUM_FILE is an alert message when a form tries to
        // use the %nextnum% derivation feature but you haven't
        // setup FormMail's configuration correctly.
		// Parameters:
        //  none
	$aMessages[MSG_NO_NEXT_NUM_FILE] = 'You cannot use the %nextnum% feature: '.
                                        'you have not configured NEXT_NUM_FILE';

		// MSG_NEXT_NUM_FILE is an alert message when a form tries to
        // use the %nextnum% derivation feature but the next number file cannot
        // be processed.
		// Parameters:
        //  FILE    name of the file
        //  ACT     action
        //  ERR     more error information
	$aMessages[MSG_NEXT_NUM_FILE] = 'Cannot $ACT next number file '.
                                            '\'$FILE\': $ERR';

		// MSG_MULTI_UPLOAD is an alert message when processing of uploaded
        // fails during a multi-page form sequence
		// Parameters:
		//	none
	$aMessages[MSG_MULTI_UPLOAD] = 'File upload processing failed during '.
                                    'multi-page form processing.';

		// MSG_URL_PARSE is an error message when a URL to be opened
        // cannot be parsed
		// Parameters:
		//	none
	$aMessages[MSG_URL_PARSE] = 'Failed to parse URL';

		// MSG_URL_SCHEME is an error message when a URL to be opened
        // has an unsupported "scheme" value
		// Parameters:
		//	SCHEME     the scheme that was seen
	$aMessages[MSG_URL_SCHEME] = 'Unsupported URL scheme "$SCHEME"';

		// MSG_SOCKET is an error message when opening a socket for a URL
        // fails
		// Parameters:
		//	ERRNO     the error code
        //  ERRSTR    the error string
        //  PHPERR    the value of $php_errormsg
	$aMessages[MSG_SOCKET] = 'Socket error $ERRNO: $ERRSTR: $PHPERR';

		// MSG_GETURL_OPEN is an error message when the web server reports
        // a failure on opening a URL
		// Parameters:
		//	STATUS     the HTTP status value (number + string)
	$aMessages[MSG_GETURL_OPEN] = 'Open URL failed: $STATUS';

		// MSG_FILE_UPLOAD_ERRn are the error messages corresponding to the
        // PHP file upload error code n.
		// Parameters:
		//	none
    $aMessages[MSG_FILE_UPLOAD_ERR1] = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
    $aMessages[MSG_FILE_UPLOAD_ERR2] = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the html form.';
    $aMessages[MSG_FILE_UPLOAD_ERR3] = 'The uploaded file was only partially uploaded.';
    $aMessages[MSG_FILE_UPLOAD_ERR4] = 'No file was uploaded.';

		// MSG_FILE_UPLOAD_ERR_UNK is displayed when an unknown error code
        // is provided by PHP for a file upload
		// Parameters:
		//	ERRNO   the error code
    $aMessages[MSG_FILE_UPLOAD_ERR_UNK] = 'Unknown file upload error code $ERRNO';

    	// MSG_FILE_UPLOAD_SIZE is displayed when an uploaded file exceeds
        // the configured maximum size
		// Parameters:
		//	NAME   the uploaded file's name
        //  SIZE   the size of the uploaded file
        //  MAX    the maximum size that was exceeded
    $aMessages[MSG_FILE_UPLOAD_SIZE] = 'Uploaded file "$NAME" is too big ('.
                                        '$SIZE bytes). The maximum permitted '.
                                        'size is $MAX kilobytes.';

		// MSG_DER_FUNC_ERROR is sent in an Alert message when
		// a form uses a derive_fields function that's
		// formatted incorrectly
		// Parameters:
		//	$SPEC	the invalid value specification
        //  $MSG    a message describing the error or providing an example
	$aMessages[MSG_DER_FUNC_ERROR] = 'derive_fields: invalid function specification '.
									 '"$SPEC": $MSG';

    	// MSG_DER_FUNC_SIZE_FMT describes the right syntax for the "size" function
		// Parameters:
		//	none
    $aMessages[MSG_DER_FUNC_SIZE_FMT] = '"size" function requires this format: '.
                                    'size(file_field)';

    	// MSG_DER_FUNC_IF_FMT describes the right syntax for the "if" function
		// Parameters:
		//	none
    $aMessages[MSG_DER_FUNC_IF_FMT] = '"if" function requires this format: '.
                                    'if(field;spec;spec)';

    	// MSG_DER_FUNC_NEXTNUM_FMT describes the right syntax for the "nextnum" function
		// Parameters:
		//	none
    $aMessages[MSG_DER_FUNC_NEXTNUM_FMT] = '"nextnum" function requires this format: '.
                                    'nextnum(pad) or nextnum(pad;base).  pad and base '.
                                    'must be numbers. base must be 2 to 36 inclusive';

    	// MSG_DER_FUNC_EXT_FMT describes the right syntax for the "ext" function
		// Parameters:
		//	none
    $aMessages[MSG_DER_FUNC_EXT_FMT] = '"ext" function requires this format: '.
                                    'ext(file_field)';

    	// MSG_DER_FUNC1_FMT describes the right syntax for a function
        // requiring one parameter
		// Parameters:
		//	FUNC    name of the function
    $aMessages[MSG_DER_FUNC1_FMT] = '"$FUNC" function requires this format: '.
                                    '$FUNC(fieldname)';

}  // <A NAME="BuiltinMessages"> Jump to: <A HREF="#MessageNumbers">

	//
	// Load the default language, and then override with an optional language file.
	//
function LoadLanguage()
{
	LoadBuiltinLanguage();
	LoadLanguageFile();
}

	//
	// To return the value of a string or empty string if not set.
	//
function CheckString($ss)
{
	return (isset($ss) ? $ss : "");
}

$aGetMessageSubstituteErrors = array();
$aGetMessageSubstituteFound = array();
$bGetMessageSubstituteNoErrors = false;

	//
	// Worker function for GetMessage's preg_replace_callback calls.
	// Returns the value of the matched variable name.
	// Variables are searched for in the global $aGetMessageValues.
	// If no such variable exists, an empty string is returned and the
	// global variable $aGetMessageSubstituteErrors lists the missing names.
	//
function GetMessageSubstituteParam($a_matches)
{
	global	$aGetMessageValues,$aGetMessageSubstituteErrors;
	global	$aGetMessageSubstituteFound,$bGetMessageSubstituteNoErrors;

	$s_name = $a_matches[1];
	$aGetMessageSubstituteFound[] = $s_name;
	$s_value = "";
	if (isset($aGetMessageValues[$s_name]))
		$s_value = $aGetMessageValues[$s_name];
	elseif ($bGetMessageSubstituteNoErrors)
		$s_value = '$'.$s_name;
	else
		$aGetMessageSubstituteErrors[] = $s_name;
	return ($s_value);
}

	//
	// Returns message text from a message number, with optional parameters.
	//
function GetMessage($i_msg_num,$a_params = array(),
						$b_show_mnum = true,$b_no_errors = false)
{
	global	$aMessages,$sLangID,$bShowMesgNumbers;

	if (!isset($aMessages[$i_msg_num]))
	{
		SendAlert("Unknown Message Number $i_msg_num was used",false,true);
		$s_text = "<UNKNOWN MESSAGE NUMBER>";
	}
	else
		$s_text = $aMessages[$i_msg_num];
	$s_mno = $bShowMesgNumbers ? "[M$i_msg_num]" : "";

    $s_orig_text = $s_text;
		//
		// substitute parameters; only works with PHP version 4.0.5 or later
		//
	if (strpos($s_text,'$') !== false)
	{
		global	$aGetMessageValues,$aGetMessageSubstituteErrors;
		global	$aGetMessageSubstituteFound,$bGetMessageSubstituteNoErrors;

		$aGetMessageSubstituteErrors = array();
		$aGetMessageSubstituteFound = array();
		$aGetMessageValues = $a_params;
		$bGetMessageSubstituteNoErrors = $b_no_errors;
		$aGetMessageValues["MNUM"] = $s_mno;	// add the message number
			//
			// search for words in this form:
			//		$word
			// where word begins with an alphabetic character and
			// consists of alphanumeric and underscore
			//
		$s_text = preg_replace_callback('/\$([a-z][a-z0-9_]*)/i',
											'GetMessageSubstituteParam',$s_text);
		if (count($aGetMessageSubstituteErrors) > 0)
			SendAlert("Message Number $i_msg_num ('$s_orig_text') in language $sLangID ".
						"specified the following unsupported parameters: ".
						implode(',',$aGetMessageSubstituteErrors));
		if (!in_array("MNUM",$aGetMessageSubstituteFound))
				//
				// append the message number
				//
			$s_text .= $b_show_mnum ? " $s_mno" : "";
	}
	else
			//
			// append the message number
			//
		$s_text .= $b_show_mnum ? " $s_mno" : "";
		//
		// replace '\n' sequences with new lines
		//
	return (str_replace('\n',"\n",$s_text));
}

	//
	// Check for old version of PHP - die if too old.
	//
function IsOldVersion(&$a_this_version)
{
    $a_modern = array(4,1,0);   // versions prior to this are "old" - "4.1.0"
	$s_req_string = "4.0.5";	// version 4.0.5 of PHP is required from
								// FormMail 5.00 onward (because we use
								// preg_replace_callback for all messages to
								// support languages other than English)
    $a_too_old = explode(".",$s_req_string);

    $i_cannot_use = ($a_too_old[0] * 10000) +
                    ($a_too_old[1] * 100) +
                    $a_too_old[2];

	$s_vers_string = phpversion();
    $a_this_version = explode(".",$s_vers_string);
    $i_this_num = ($a_this_version[0] * 10000) +
                    ($a_this_version[1] * 100) +
                    $a_this_version[2];

    if ($i_this_num <= $i_cannot_use)
        die(GetMessage(MSG_SCRIPT_VERSION,array("PHPREQ"=>$s_req_string,
												"PHPVERS"=>$s_vers_string)));
    $i_modern_num = ($a_modern[0] * 10000) +
                    ($a_modern[1] * 100) +
                    $a_modern[2];
    return ($i_this_num < $i_modern_num);
}

	//
	// Check if the server is Windows
	//
function IsServerWindows()
{
	static	$bGotAnswer = false;
	static	$bAnswer;

	if (!$bGotAnswer)
	{
		if ((isset($_ENV["OS"]) && stristr($_ENV["OS"],"windows") !== false) ||
			(isset($_SERVER["PATH"]) && stristr($_SERVER["PATH"],"winnt") !== false) ||
			(isset($_SERVER["PATH"]) && stristr($_SERVER["PATH"],"windows") !== false) ||
			(isset($_SERVER["SystemRoot"]) && stristr($_SERVER["SystemRoot"],"winnt") !== false) ||
			(isset($_ENV["SystemRoot"]) && stristr($_ENV["SystemRoot"],"winnt") !== false) ||
			(isset($_SERVER["SystemRoot"]) && stristr($_SERVER["SystemRoot"],"windows") !== false) ||
			(isset($_ENV["SystemRoot"]) && stristr($_ENV["SystemRoot"],"windows") !== false) ||
			(isset($_SERVER["Path"]) && stristr($_SERVER["Path"],"windows") !== false))
			$bAnswer = true;
		else
			$bAnswer = false;
		$bGotAnswer = true;
	}
	return ($bAnswer);
}

	//
	// To return a temporary file name from $SCRATCH_PAD
	//
function GetScratchPadFile($s_prefix)
{
	global	$SCRATCH_PAD;

	switch (substr($SCRATCH_PAD,-1))
	{
	case '/':
	case '\\':
		$s_dir = substr($SCRATCH_PAD,0,-1);
		break;
	default:
		$s_dir = $SCRATCH_PAD;
		break;
	}
		//
		// Ideally, we could use tempnam. But,
		// tempnam is system dependent and might not use the
		// SCRATCH_PAD directory even if we tell it to.
		// So, we'll force the file into SCRATCH_PAD.
		//
		// Note that we do *not* create the file, even though tempnam
		// does create it in PHP version 4.0.3 and above. (The reason is
		// we can't guarantee a non-race condition anyway.)
		//
	do
	{
		$i_rand = mt_rand(0,16777215);	// 16777215 is FFFFFF in hex
		$s_name = $SCRATCH_PAD."/".$s_prefix.sprintf("%06X",$i_rand);
	}
	while (file_exists($s_name));
    return ($s_name);
}

	//
	// To return a temporary file name.
	//
function GetTempName($s_prefix)
{
	global	$SCRATCH_PAD;

	if (isset($SCRATCH_PAD) && !empty($SCRATCH_PAD))
		$s_name = GetScratchPadFile($s_prefix);
	else
		$s_name = tempnam("/tmp",$s_prefix);
	return ($s_name);
}

	//
	// To find a directory on the server for temporary files.
	//
function GetTempDir()
{
	$s_name = GetTempName("fm");
	if (file_exists($s_name))
		unlink($s_name);
	$s_dir = dirname($s_name);
	return ($s_dir);
}

	//
	// Returns true if the PHP version is at or later than the string specified
	// (can't use "version_compare" before 4.1.0).
	//
function IsPHPAtLeast($s_vers)
{
	global	$aPHPVERSION;

    $a_test_version = explode(".",$s_vers);
	if (count($a_test_version) < 3)
		return (false);
	return ($aPHPVERSION[0] > $a_test_version[0] ||
			($aPHPVERSION[0] == $a_test_version[0] &&
				($aPHPVERSION[1] > $a_test_version[1] ||
					$aPHPVERSION[1] == $a_test_version[1] &&
						$aPHPVERSION[2] >= $a_test_version[2])));
}

define('DEBUG',false);		// for production
//define('DEBUG',true);			// for development and debugging

if (DEBUG)
{
	error_reporting(E_ALL);		// trap everything!
	LoadLanguage();
}
else
{
	$iOldLevel = error_reporting(E_ALL ^ E_WARNING);
	LoadLanguage();
		//
		// report everyting except warnings and notices
		//
	error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
}

$bUseOldVars = IsOldVersion($aPHPVERSION);

	//
	// seed the random number generate if not version 4.2.0 or later
	//
if (!IsPHPAtLeast("4.2.0"))
	mt_srand(time());

    //
    // we set references to the appropriate arrays to handle PHP version differences
    // Session vars are selected after we start the session.
    //
if ($bUseOldVars)
{
    $aServerVars = &$HTTP_SERVER_VARS;
    $aGetVars = &$HTTP_GET_VARS;
    $aFormVars = &$HTTP_POST_VARS;
    $aFileVars = &$HTTP_POST_FILES;
    $aEnvVars = &$HTTP_ENV_VARS;
}
else
{
	$aServerVars = &$_SERVER;
    $aGetVars = &$_GET;
	$aFormVars = &$_POST;
    $aFileVars = &$_FILES;
    $aEnvVars = &$_ENV;
}
$bIsGetMethod = false;

	//
	// If the form submission was using the GET method, switch to the
	// GET vars instead of the POST vars
	//
if (isset($aServerVars["REQUEST_METHOD"]) && $aServerVars["REQUEST_METHOD"] === "GET")
{
	$bIsGetMethod = true;
	if ($bUseOldVars)
		$aFormVars = &$HTTP_GET_VARS;
	else
		$aFormVars = &$_GET;
}

function SetRealDocumentRoot()
{
	global	$aServerVars,$REAL_DOCUMENT_ROOT;

	if (isset($aServerVars['SCRIPT_FILENAME']))
		$REAL_DOCUMENT_ROOT = $aServerVars['SCRIPT_FILENAME'];
	elseif (isset($aServerVars['PATH_TRANSLATED']))
		$REAL_DOCUMENT_ROOT = $aServerVars['PATH_TRANSLATED'];
	else
		$REAL_DOCUMENT_ROOT = "";
		//
		// look for 'www' or 'public_html' and strip back to that if found,
		// otherwise just get the directory name
		//
	if (($i_pos = strpos($REAL_DOCUMENT_ROOT,"/www/")) !== false)
		$REAL_DOCUMENT_ROOT = substr($REAL_DOCUMENT_ROOT,0,$i_pos+4);
	elseif (($i_pos = strpos($REAL_DOCUMENT_ROOT,"/public_html/")) !== false)
		$REAL_DOCUMENT_ROOT = substr($REAL_DOCUMENT_ROOT,0,$i_pos+12);
	elseif (!empty($REAL_DOCUMENT_ROOT))
		$REAL_DOCUMENT_ROOT = dirname($REAL_DOCUMENT_ROOT);
	elseif (isset($aServerVars['DOCUMENT_ROOT']) &&
			!empty($aServerVars['DOCUMENT_ROOT']))
		$REAL_DOCUMENT_ROOT = $aServerVars['DOCUMENT_ROOT'];
}

if (!isset($REAL_DOCUMENT_ROOT))
	SetRealDocumentRoot();

if (isset($aServerVars['SERVER_PORT']))
	$SCHEME = ($aServerVars['SERVER_PORT'] == 80) ? "http://" : "https://";
else
	$SCHEME = "";
if (isset($aServerVars['SERVER_NAME']))
	$SERVER = $aServerVars['SERVER_NAME'];
else
	$SERVER = "";

/*****************************************************************************/
/* CONFIGURATION (do not alter this line in any way!!!)                      */
/*****************************************************************************
 * This is the *only* place where you need to modify things to use formmail.php
 * on your particular system.  This section finishes at "END OF CONFIGURATION".
 *
 * Each variable below is marked as LEAVE, OPTIONAL or MANDATORY.
 * What we mean is:
 *		LEAVE		you can change this if you really want to and know what
 *					you're doing, but we recommend that you leave it unchanged
 *
 *		OPTIONAL	you can change this if you need to, but its current
 *					value is fine and we recommend that you leave it unchanged
 *					unless you need a different value
 *
 *		MANDATORY	you *must* modify this for your system.  The script will
 *					not work if you don't set the value correctly.
 *
 *****************************************************************************/

	//
	// ** LEAVE **
	// EMAIL_NAME is a limited set of characters that you can use for your
	// target email user names (the text before the "@");
	// these are accepted:
	//		russellr
	//		russ.robinson
	//		russ61robbo
	//
	// The pattern we've provided doesn't match every valid user name in an
	// email address, but, since these email addresses are ones you'll
	// choose and are part of your organisation, the limited set is generally
	// no problem.
	//
	// If you want to use other user names, then you need to change the pattern
	// accordingly.
	//
	// We recommend that you don't modify this pattern, but, rather, use
	// conforming email user names as your target email addresses.
	// BTW, the pattern is processed case-insensitively, so there's
	// no need to provide upper and lower case values.
	//
define("EMAIL_NAME","^[-a-z0-9.]+");	// the '^' is an important security feature!

    //
	// ** MANDATORY **
    // Set TARGET_EMAIL to a list of patterns that callers are allowed
    // to send mail to; this is a *critical* security mechanism and
	// prevents relaying.  Relaying is where an unauthorized person uses this
	// script to send mail to *anyone* in the world.
	//
	// By setting TARGET_EMAIL to a set of patterns for your email addresses,
	// then relaying is prevented.
	//
	// More information about TARGET_EMAIL.
	//
	// Instructions
	// ~~~~~~~~~~~~
	//	1.	If you only have one host or domain name:
	//			replace "yourhost" with the name of your email server computer.
	//		For example,
	//			EMAIL_NAME."@yourhost\.com$"
	//		becomes:
	//			EMAIL_NAME."@microsoft\.com$"
	//		If you work for Microsoft (microsoft.com).
	//
	//	2.	If you have a domain name other than ".com":
	//			replace "yourhost\.com" with your email server's full
	//			domain name.
	//		For example,
	//			EMAIL_NAME."@yourhost\.com$"
	//		becomes:
	//			EMAIL_NAME."@apache\.org$"
	//		If you work for the Apache organisation (apache.org).
	//		Another example is:
	//			EMAIL_NAME."@rootsoftware\.com\.au$"
	//		If you work for Root Software in Australia (rootsoftware.com.au).
	//
	//	3.	If you want to accept email to several domains, you can do that too.
	//		Here's an example.  At Root Software, our forms can send to any of
	//		the following domains:
	//			rootsoftware.com
	//			rootsoftware.com.au
	//			ttmaker.com
	//			timetabling.org
	//			timetabling-scheduling.com
	//			tectite.com
	//		To achieve this, we have the following setting:
	//			$TARGET_EMAIL = array(EMAIL_NAME."@rootsoftware\.com$",
	//								EMAIL_NAME."@rootsoftware\.com\.au$",
	//								EMAIL_NAME."@ttmaker\.com$",
	//								EMAIL_NAME."@timetabling\.org$",
	//								EMAIL_NAME."@timetabling-scheduling\.com$",
	//								EMAIL_NAME."@tectite\.com$",
	//								);
	//
	//	4.	If you want to accept email to several specific email addresses,
	//		that's fine too.  Here's an example:
	//			$TARGET_EMAIL = array("^russell\.robinson@rootsoftware\.com$",
	//								"^info@ttmaker\.com$",
	//								"^sales@timetabling\.org$",
	//								"^webmaster@timetabling-scheduling\.com$",
	//								);
	//		or just one email address:
	//			$TARGET_EMAIL = array("^russell\.robinson@rootsoftware\.com$");
	//
	//
	// More Instructions
	// ~~~~~~~~~~~~~~~~~
	// TARGET_EMAIL is an array.  This means it can contain many "elements".
	// Each element is a string (a set of characters in quotes).
	// To create many elements, you simply list the strings separated by
	// a comma.
	// For example:
	//		$TARGET_EMAIL = array("String 1","String 2","String 3");
	//
	// You can put a newline after each comma, to make it more readable.
	// Like this:
	//		$TARGET_EMAIL = array("String 1",
	//							  "String 2",
	//							  "String 3");
	//
	// If you look below, you may be wondering why you can see the following:
	//		EMAIL_NAME."@yourhost\.com$"
	// and that's not a string!
	//
	// It's a string concatenation. EMAIL_NAME is a string (and you can
	// see it defined above), and the "." after it says "append the following
	// string to EMAIL_NAME and make one larger string".
	//
	// So,
	//		EMAIL_NAME."@yourhost\.com$"
	// becomes the string:
	//		"^[-a-z0-9.]+@yourhost\.com$"
	//
	// What are all the \ ^ $ and other punctuation characters?
	//
	// The strings we're defining contain "patterns".  We won't go into
	// patterns here (it's a large subject), but we will explain a few
	// important things:
	//	^	means the beginning; we want email user names to match only
	//		at the beginning of the input, so that's why EMAIL_NAME starts
	//		with ^
	//	.	matches any single character
	//	\	stops the following character from being a pattern matcher
	//	$	matches the end
	//
	// So, when we want to match ".com", we need to say "\.com".  Otherwise,
	// ".com" would match "Xcom", "Ycom", "xcom", etc., as well as ".com".
	// The "\." says match only ".".
	//
	// Also, if your server is "yourhost.com", you don't want to match
	// "yourhost.com.anythingelse", so we put "yourhost\.com$" to match
	// the end.
	//
	// Note: if you're going to send to a domain that you don't own (e.g.
	// yahoo.com or hotmail.com), *DO NOT* use the EMAIL_NAME feature.
	// If you do, then your installation of FormMail could become a
	// spam gateway!  Instead, specify exact email addresses using one
	// of the examples below.
	//
	// For security purposes, it's best to include ^ at the start and
	// $ at the end of all email address patterns.  This will prevent spammers
	// from exploiting any vulnerabilities in your server or its software.
	//
	// Finally, don't use your AT_MANGLE (see below) characters here.
	// The $TARGET_EMAIL needs to look like a real email address or pattern.
	// You must use "@".  Don't worry, spammers can't see inside formmail.php
	// so they can't get the email addresses or patterns you put in $TARGET_EMAIL.
    //
$TARGET_EMAIL = array("^autoreply@fastresponseacademics\.com$");
						

	//
	// here are some other examples...
	//
//$TARGET_EMAIL = array("^yourname@yourhost\.com$");
//$TARGET_EMAIL = array("^yourname@yourhost\.com$","^someone@yourhost\.com$");
//$TARGET_EMAIL = array(EMAIL_NAME."@yourhost\.com$",EMAIL_NAME."@otherhost\.com$");

	//
	// ** OPTIONAL BUT STRONGLY RECOMMENDED **
	// Set DEF_ALERT to the email address that will be sent any alert
	// messages (such as errors) from the script.  This value is
	// only used if the 'alert_to' is not provided by the form.
	// If neither alert_to nor DEF_ALERT are provided, no alerts are sent.
	//
	// DEF_ALERT can be any email address and it's independent of
	// the TARGET_EMAIL setting.
	//
	// Example:
	//		webmaster@yourhost.com
	//
	// If you set DEF_ALERT, you can do some initial tests with your browser.
	// Just open this URL:
	//		http://www.your-site.com/formmail.php?testalert=1
	//
//define("DEF_ALERT","you@yoursite.com");       // example - straight email address
define("DEF_ALERT","autoreply@fastresponseacademics.com");
					


	//
	// ** OPTIONAL **
	// SET_REAL_DOCUMENT_ROOT tells FormMail the DocumentRoot for your website.
	//
	// Automatically finding the document root for your website in PHP can be
	// quite problematical.  $_SERVER["DOCUMENT_ROOT"] is often correct,
	// but sometimes it's not provided (e.g. with a CGI interface) and with
	// certain secure server configurations, it's completely inappropriate.
	//
	// For example, our website at http://www.tectite.com/ also lives
	// at https://secure.rootsoftware.com/~tectite/.  If we run FormMail
	// from the latter location (such as when you place an order)
	// $_SERVER["DOCUMENT_ROOT"] is set to "/home/secure" - which is completely
	// wrong and won't work.
	//
	// The function above - SetRealDocumentRoot - is designed to set
	// $REAL_DOCUMENT_ROOT to the right value based on the setting
	// of SCRIPT_FILENAME or PATH_TRANSLATED (or as a last attempt, DOCUMENT_ROOT).
	//
	// SetRealDocumentRoot should work on most servers in most situations.
	// However, it might not work on your server.  Therefore, you can set
	// $SET_REAL_DOCUMENT_ROOT to the correct value for your website.
    // Use an absolute directory pathname such as:
	//
	//		/home/yourname/public_html
	//		d:/inet/user/htdocs
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\document_root"
    // or
    //      "d:/path/to/document_root"
    //
	// If you're not using the "filter" feature in your forms, you don't
	// need to worry about these settings.
	//
$SET_REAL_DOCUMENT_ROOT = "";		// overrides the value set by SetRealDocumentRoot function

    //
    // override $REAL_DOCUMENT_ROOT from the $SET_REAL_DOCUMENT_ROOT value (if any)
    // Do not alter the following code (next 3 lines)!
    //
if (isset($SET_REAL_DOCUMENT_ROOT) && $SET_REAL_DOCUMENT_ROOT !== "")
    $REAL_DOCUMENT_ROOT = $SET_REAL_DOCUMENT_ROOT;

	//
	// ** OPTIONAL **
	// CONFIG_CHECK tells FormMail which configuration variables to check.
	//
	// Currently, only TARGET_EMAIL is checked and it is tested for
	// the best known patterns for securing your FormMail installation.
	//
	// If you're sure you've got your configuration correct and want to
	// stop warnings you are receiving in alert messages, you can
	// remove the name of the configuration variable you *don't* want
	// checked from the CONFIG_CHECK array.
	//
$CONFIG_CHECK = array("TARGET_EMAIL");

	//
	// ** OPTIONAL **
	// Set AT_MANGLE to a string to replace with "@".  To disable this
	// feature, set to empty string.
	//
	// If you enable this feature, you can protect the email addresses
	// you specify in your forms from SpamBots.
	//
	// SpamBots are programs that search for email addresses on the
	// Internet.  Typically, they look for "mailto:someone@somewhere".
	//
	// However, email addresses you specify in your forms will be like
	// this:
	//	<input type="hidden" name="recipients" value="someone@yourhost.com">
	//
	// It is possible that some SpamBots will find your email addresses hidden
	// in your forms.
	//
	// The AT_MANGLE feature allows you to mangle your email addresses and
	// protect them from SpamBots.
	//
	// Here's an example:
	//			define("AT_MANGLE","_*_");
	//
	// This tells formmail.php to replace "_*_" in your email address with "@".
	// So, in your forms you can specify:
	//	<input type="hidden" name="recipients" value="someone_*_yourhost.com">
	//
	// No SpamBot will recognize this as an email address, and your addresses
	// will be safe!
	//
	// If you use this feature, we encourage you to be creative and different
	// from everyone else.
	//
	// Here are some more examples:
	//			define("AT_MANGLE","_@_");		// e.g. john_@_yourhost.com
	//											// SpamBots may recognize this,
	//											// but it'll be an invalid address
	//
	//			define("AT_MANGLE","AT");		// e.g. johnATyourhost.com
	//
	// Note that the AT_MANGLE pattern match is case-sensitive, so "AT" is
	// different from "at".
	//
define("AT_MANGLE","spammyspammyspamspam");

	//
	// ** OPTIONAL **
	// Set TARGET_URLS to a list of URL prefixes that are acceptable.
	// TARGET_URLS is used for the "crm_url" feature and for multi-page
    // forms.
	// No pattern matching is allowed, and all comparisons are
	// performed by first converting to lower case.
	//
$TARGET_URLS = array();			// default; no URLs allowed

// The following example allows one URL.  NOTE: the trailing '/' is important
// for security!  It prevents attackers from specifying port numbers.
//$TARGET_URLS = array("http://www.yourhost.com/")

// The following example specifies a number of URLs.
//$TARGET_URLS = array( "http://www.yourhost.com/",
//						"http://www.someotherhost.com/",
//						"http://www.specialplace.com:81/");

	//
	// ** LEAVE **
	// HEAD_CRLF is the line termination for email header lines.  The email
	// standard (RFC-822) specifies line termination should be CR plus LF.
	//
	// Many mail systems will work with just LF and some are reported to
	// actually fail if the email conforms to the standard (with CR+LF).
	//
	// If you have special requirements you can change HEAD_CRLF to another
	// string (such as "\n" to just get LF (line feed)), but be warned that
	// this may break the email standard.
    //
    // Note: the following information was reported by a customer, which he
    // found on php.net:
    //  "If you're using Postfix for SMTP on FreeBSD you MUST end header
    //  lines with \n and not \r\n."
    //  The relevant URL is: http://php.net/mail
	//
define("HEAD_CRLF","\r\n");

	//
	// ** OPTIONAL **
	// BODY_LF is the line termination for email body lines.  The email
	// standard (RFC-822) does not clearly specify line termination for the body
	// of emails; the body doesn't have to have any "lines" at all.  However,
	// it does allow CR+LF between sections of text in the body.
	//
	// RFC-821 specifies a line length that must be supported of 998 octets
	// (1000 include the CR+LF).
	//
	// Most mail systems will work with just LF and that used to be the default
	// for FormMail prior to version 2.00.
	//
	// With the implementation of HTML template support (using MIME RFC-2045)
	// we've changed the default to CR+LF.
	//
	// If you want your email bodies to be line terminated differently, you
	// can specify a different value below.
    //
    // To change the setting, you must comment out the "define" line you
    // don't want (put '//' at the beginning of the line) and un-comment
    // the line you do want (remove '//' from the beginning of the line).
	//
//define("BODY_LF","\n");		// the old default: just LF
define("BODY_LF","\r\n");		// the new default: use this for CR+LF

	//
	// ** OPTIONAL **
	// Set FROM_USER to the email address that will be the sender
	// of alert/error messages and Auto Responses (if used).
    // If you do not specify FROM_USER (that is, you comment it out),
	// formmail.php uses "FormMail@SERVER" where SERVER is determined
	// from your web server. If you set it to "NONE", then no sender is
    // specified.
    // NOTE: FROM_USER is not used for form results, it is only used
    // for alert messages and Auto Responses.
	//
//$FROM_USER = "formmail@yourhost.com";		// example - replace with your email address
//$FROM_USER = "NONE";						// use this to show no sender
$FROM_USER = "";                            // the default - setting not used

	//
	// ** LEAVE **
	// SENDMAIL_F_OPTION controls whether to use the "-f" option when
	// sending mail.  Some servers use a Mail Transfer Agent called "sendmail"
	// and some of these require the "-f" option to be provided - this option
	// tells sendmail the "From" user or sender.
	// FormMail originally supported this feature using the "mail_options"
	// setting inside your HTML forms.  That was a silly place for us to
	// put this feature!  It's a server configuration, so it should live
	// in this configuration section of FormMail, not in your forms.
	//
	// Set SENDMAIL_F_OPTION to true to tell FormMail to specify the "-f"
	// option when sending mail or set it to false to prevent FormMail
	// from specifying it.
	//
	// Now this gets a little complicated....
	// FormMail distinguishes between the "From" address and the "sender".
	// The "sender" is used by SENDMAIL_F_OPTION.  The "From" address is not.
	//
	// For form results:
	//		The "From" address for form results is usually the email address
	//		entered by the user on the form (the "email" field). If you set
	//		FromAddr in mail_options, the "From" address is set to this value
	//		and the "sender" is also set to this value.  If you do not set
	//		FromAddr, then the "From" address is set to the "email" field
	//		(plus the "realname" field) from the form and there is no "sender".
    //
	// For alert messages:
	//		Both "From" address and "sender" are set according to the
	//		rules for the $FROM_USER configuration (see above).
    //
    // Following is a complete description of the emailing logic.  This logic
    // is quite complicated because different servers have different and,
    // often, conflicting requirements.
    //
    // We define these concepts:
    //      Sender      is an email address that is deemed to be sending
    //                  an email.
    //      From Line   is an email address that is deemed to be the
    //                  "From" address in an email being sent.
    //
    // For Form Results (see below for Alert Messages and Auto Responses):
    //      If the "FromAddr" feature is used by the form, then:
    //          1. Set Sender to the FromAddr value; and
    //          2. Set From Line to FromAddr value.
    //      If the "FromAddr" feature is not used by the form, then:
    //          1. If SET_SENDER_FROM_EMAIL is set to true, then
    //              Set Sender to the "email" value from the form,
    //             otherwise,
    //              leave Sender unset; and
    //          2. Set From Line to the realname + email fields from
    //             the form.
    //
    // For Alert Messages and Auto Responses (see above for Form Results):
    //      if FROM_USER (in FormMail's configuration) is set and is not
    //      empty, then:
    //          if has the value "NONE", then:
    //              do not set either Sender or From Line values
    //          otherwise:
    //              set Sender and From Line values to the FROM_USER value;
    //      if FROM_USER is not set or it's empty, then:
    //          set Sender and From Line values to a fake address on the
    //          server (FormMail@domain).
    //
    // For all emails (form results, alerts and auto responses):
    //      If SENDMAIL_F_OPTION is true:
    //          if Sender is set, specify its value with the -f option
    //          in the mail command.
    //      If INI_SET_FROM is true:
    //          if Sender is set, specify its value to the "sendmail_from"
    //          PHP option.
    //      In every case:
    //          set the "From:" field of the email to the value of From Line.
	//
define("SENDMAIL_F_OPTION",false);
define("SENDMAIL_F_OPTION_LINE",__LINE__-1);    // don't modify this line!

	//
	// ** LEAVE **
    // SET_SENDER_FROM_EMAIL controls whether the "Sender" is set from the
    // email field.
    //
    // Some servers require a Sender to be specified for emails sent.
    // If your server requires this and you do not want to use the
    // FromAddr feature for form results, set SET_SENDER_FROM_EMAIL
    // to true.
    //
    // You may also need to set SENDMAIL_F_OPTION to true.
    //
    // Review the email logic description above the SENDMAIL_F_OPTION
    // configuration setting for full details.
    //
    // Note that SET_SENDER_FROM_EMAIL is not used if the form specifies
    // FromAddr.
    //
define("SET_SENDER_FROM_EMAIL",false);

	//
	// ** LEAVE **
	// INI_SET_FROM controls whether FormMail attempts to set the
	// "sendmail_from" feature in the PHP configuration.  This PHP
	// feature only applies to Windows servers.
 	// You can find this feature inside the "php.ini" file.  On most servers
	// it will be set correctly and you don't need to change it.
	// However, some servers have this set incorrectly in php.ini and this
	// prevents PHP scripts from sending mail!
	//
	// Set INI_SET_FROM to true to request FormMail to set this PHP
	// feature to the sender of the emails it sends.  You may also
	// need to set $FROM_USER in this configuration section (for alert messages)
	// and use the FromAddr feature in "mail_options" in your forms (for
	// sending form results).  However, test each case individually.
	//
	// INI_SET_FROM sets the sender according to the documentation shown
	// above for SENDMAIL_F_OPTION.  This means that if you need
	// INI_SET_FROM set to true, then you must also either require the "email"
	// field on a form or specify the FromAddr in the "mail_options" on
	// the form.
    //
    // Review the email logic description above the SENDMAIL_F_OPTION
    // configuration setting for full details.
	//
define("INI_SET_FROM",false);

	//
	// ** OPTIONAL **
	// Set LOGDIR to the directory on your server where log files are
	// stored.  When the form provides a 'logfile' value, formmail.php
	// expects the file to be in this directory.
	// Generally you want this to be outside your server's WWW directory.
 	// For example, if your server's root (WWW) directory is:
	//			/home/yourname/www
	// use a directory like
	//			/home/yourname/logs
	//
	// If you don't want to support log files, make this an empty string:
	//		$LOGDIR = "";
	//
	// The log file simply contains a log of FormMail activity.  It contains
	// the date/time, the form user's real name, their email address, and
	// the value of the "subject" field on the form.
	//
	// One use for the log file is for auditing: you can
	// check the number of successful form submissions and when they occurred.
	// You might use this, for example, to verify that a day's work has been
	// processed by your employees.
	//
    // FormMail user AlecRaenos told us how he uses the log file:
    //      We keep "lead" counts and this log file will be a HUGE help
    //      to us to determine:
    //          1) if our server is sending out all the processed forms -we
    //             have had trouble with this and
    //          2) auditing how many leads we get for our business.
    //
	// You might find other uses, if so, please let us know.
	//
	// NOTE: you'll need to create the log file on your server and make
	// it writable by the web server software.  For security reasons,
	// FormMail cannot do this for you.
	// In general, the correct permissions for your log file are:
	//	rw-rw-rw-
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\logs"
    // or
    //      "d:/path/to/logs"
	//
$LOGDIR = "";							// directory for log files; empty string to
										// disallow log files
	//
	// ** OPTIONAL **
	// Set AUTORESPONDLOG to the filename on your server where auto-responding
	// activity is logged.
	//
	// This file is stored in the $LOGDIR directory and it *must* be outside
	// your web server directory. If it isn't, then someone may be able to
	// harvest the email addresses from your server!
	//
	// If you don't want to to keep a log of auto responding activity,
	// make this an empty string:
	//		$AUTORESPONDLOG = "";
	//
	// Auto responding is a potential dangerous thing to allow from FormMail.
	// That's why FormMail will only do auto responding after image verification.
	//
	// However, image verification is not perfect.  It is possible for a very
	// motivated Spammer to overcome the image verification (e.g. he could
	// pay people to type in the image contents for him).
	//
	// Therefore, you should keep a log of auto responding activity.  This
	// way you can:
	//	- confirm correct operation
	//	- detect unusual activity
	//	- respond to any queries from your hosting company or anyone else
	//	  accusing you of being a spam gateway
	//
	// The log file contains:
	//	- the date/time
	//	- the IP address from where the user is submitting
	//	- the email address that the auto response was sent to
	//	- the subject line that was put in the email.
	//	- information about the activity (success, failure, etc.)
	//
	// NOTE: you'll need to create the log file on your server and make
	// it writable by the web server software.  For security reasons,
	// FormMail cannot do this for you.
	// In general, the correct permissions for your log file are:
	//	rw-rw-rw-
	//
$AUTORESPONDLOG = "";			// file name in $LOGDIR for the auto responder
								// log; empty string for no auto responder log

	//
	// ** OPTIONAL **
	// Set CSVDIR to the directory on your server where CSV files are
	// stored.  When the form provides a 'csvfile' value, formmail.php
	// expects the file to be in this directory.
	// Generally you want this to be outside your server's WWW directory.
 	// For example, if your server's root (WWW) directory is:
	//			/home/yourname/www
	// use a directory like
	//			/home/yourname/csv
	//
	// If you don't want to support CSV files, make this an empty string:
	//		$CSVDIR = "";
	//
	// NOTE: you'll need to create the CSV file on your server and make
	// it writable by the web server software.  For security reasons,
	// FormMail cannot do this for you.
	// In general, the correct permissions for your CSV file are:
	//	rw-rw-rw-
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\csv"
    // or
    //      "d:/path/to/csv"
	//
$CSVDIR = "";						// directory for csv files; empty string to
									// disallow csv files

	//
	// ** OPTIONAL **
	// If you're creating a CSV database, you can choose the field
	// separators below.
	//
	// The defaults below will suit most purposes.
	//
$CSVSEP = ",";		// comma separator between fields (columns)
$CSVINTSEP = ";";	// semicolon is the separator for fields (columns)
					// with multiple values (checkboxes, etc.)
$CSVQUOTE = '"';	// all fields in the CSV are quoted with this character;
					// default is double quote.  You can change it to
					// single quote or leave it empty for no quotes.
//$CSVQUOTE = "'";	// use this if you want single quotes
$CSVOPEN = "";		// set to "b" to force line terminations to be
					// kept as $CSVLINE setting below, regardless of
					// operating system.  Keep as empty string and
					// leave $CSVLINE unchanged, to get text file
					// terminations for your server's operating system.
					// (Line feed on UNIX, carriage-return line feed on Windows).
$CSVLINE = "\n";	// line termination for CSV files.  The default is
					// a single line feed, which may be modified for your
					// server's operating system.  If you want to change
					// this value, you *must* set $CSVOPEN = "b".

	//
	// ** OPTIONAL **
	// Set TEMPLATEDIR to the directory on your server where template files are
	// stored.
	//
	// If you want to specify "good_template", "bad_template" or "HTMLTemplate"
	// in your forms, the templates must be found in the directory you specify
	// below.
	// This is a necessary step to prevent security problems.  For example,
	// without this measure, an attacker might be able to gain access to
	// any file on your server.
	//
	// We recommend you set aside a particular directory on your
	// server for all your templates.
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\templates"
    // or
    //      "d:/path/to/templates"
	//
$TEMPLATEDIR = "";					// directory for template files; empty string
									// if you don't have any templates

	//
	// ** OPTIONAL **
	// Set TEMPLATEURL to the URL where template files can be fetched.
	// If you set TEMPLATEDIR too, that takes precedence and TEMPLATEURL
	// is ignored.
	//
	// TEMPLATEURL is analogous to TEMPLATEDIR, but allows for templates
	// to be read from a web server.  This is useful for cases where
	// you want the template to be generated via a PHP script, for example.
	//
	// You can use $SCHEME and $SERVER to refer to your own server.
	//
	// Note that the HTTP_USER_AGENT string is passed to any URL opened
	// through TEMPLATEURL with a parameter, for example:
	//		http://blah.blah/templatedir/template.php?USER_AGENT=blahblah
	//
	// This is useful for dynamically generated pages which generate different
	// content depending on the user's browser.
	//
$TEMPLATEURL = "";					// default; no template URL
//$TEMPLATEURL = $SCHEME.$SERVER."/templatedir";		// a sample using your server

	//
	// ** OPTIONAL **
	// Set MULTIFORMDIR to the directory on your server where multi-form
    // template files are stored.
	//
	// If you want to specify "next_form" in your forms, the templates must
    // be found in the directory you specify below.
    //
	// This is a necessary step to prevent security problems.  For example,
	// without this measure, an attacker might be able to gain access to
	// any file on your server.
	//
	// We recommend you set aside a particular directory on your
	// server for all your multi-form templates.
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\multiforms"
    // or
    //      "d:/path/to/multiforms"
	//
$MULTIFORMDIR = "";			// directory for multi-form template files; empty string
						    // if you're not using multi-forms

	//
	// ** OPTIONAL **
	// Set MULTIFORMURL to the URL where multi-form template files can be fetched.
	// If you set MULTIFORMDIR too, that takes precedence and MULTIFORMURL
	// is ignored.
	//
	// MULTIFORMURL is analogous to MULTIFORMDIR, but allows for templates
	// to be read from a web server.  This is useful for cases where
	// you want the template to be generated via a PHP script, for example.
	//
	// You can use $SCHEME and $SERVER to refer to your own server.
	//
	// Note that the HTTP_USER_AGENT string is passed to any URL opened
	// through MULTIFORMURL with a parameter, for example:
	//		http://blah.blah/multiforms/page2.php?USER_AGENT=blahblah
	//
	// This is useful for dynamically generated pages which generate different
	// content depending on the user's browser.
	//
$MULTIFORMURL = "";					// default; no multi-forms templates URL
//$MULTIFORMURL = $SCHEME.$SERVER."/multiforms";		// a sample using your server

	//
	// ** OPTIONAL **
	// When FormMail returns to a form for the user in a multi-page
    // form sequence, it opens a URL to read in the form.  This means your
    // server is opening a URL to itself.
    //
    // If your form requires authentication, you need FormMail to be
    // able to authenticate with the server to open the URL.
    //
    // FormMail version 7.05 attempts to provide the authentication information
    // automatically.
    //
    // If this doesn't work on your site or you want to provide a separate
    // authentication for FormMail, put the value(s) here.
    //
    // $AUTHENTICATE is placed as the value of the "Authorization:" header.
    // For example:
    //      Basic cnVzc2VsbHI6dGVzdA==
    // The second value is the Base-64 encoded user name and password
    // separated by ":".  (The above value is: "russellr:test".)
    //
    // If this is inconvenient for you, leave $AUTHENTICATE empty and
    // set $AUTH_USER and $AUTH_PW as normal strings
    // (e.g. "russellr" and "test").  When using $AUTH_USER and $AUTH_PW
    // FormMail will automatically specify "Basic" authentication.
    //
    // Note: this configruation is similar to that in FMBadHandler, but
    // in FormMail it's only used in multi-page form processing.
    //
$AUTHENTICATE = "";
//$AUTHENTICATE = "Basic cnVzc2VsbHI6dGVzdA==";        // example
$AUTH_USER = "";
$AUTH_PW = "";

	//
	// ** OPTIONAL **
	// Set $FORM_INI_FILE to the file name on your server
    // where you keep secret settings for your forms.
    //
    // This is how you hide email addresses, force particular conditions,
    // or other settings that you don't want exposed in the HTML.
    //
$FORM_INI_FILE = "";
//$FORM_INI_FILE = "/home/mysite/formmail.ini";

	//
	// ** OPTIONAL **
	// Set MODULEDIR to the directory on your server where you install
    // FormMail compatible modules.
    //
    // The default value ('.' for current directory) is suitable if
    // you install modules in the same directory as formmail.php.
    //
    // Because modules may be accessible from internet browsers, you
    // may wish to install them in a different directory, which you
    // protect from unauthorized access.
    //
    // The modules we provide are generally safe from unauthorized access
    // but we still recommend you use a separate directory for modules
    // and protect it from unauthorized access using a .htaccess file or
    // equivalent for your web server.
    //
    // If you are reserving a directory for FormMail modules, set the
    // directory in this configuration setting.
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\templates"
    // or
    //      "d:/path/to/templates"
	//
$MODULEDIR = ".";

	//
	// ** LEAVE **
	// Set FMCOMPUTE to the name of the "fmcompute.php" module you want
    // to load.
    //
    // This is a standard name, but you may want to use a different name
    // for temporary testing purposes.
    // The module is always loaded from $MODULEDIR (above).
	//
$FMCOMPUTE = "fmcompute.php";

	//
	// ** LEAVE **
	// Set FMGEOIP to the name of the "fmgeoip.php" module you want
    // to load.
    //
    // This is a standard name, but you may want to use a different name
    // for temporary testing purposes.
    // The module is always loaded from $MODULEDIR (above).
	//
$FMGEOIP = "fmgeoip.php";

	//
	// ** OPTIONAL **
	// Set ADVANCED_TEMPLATES to true if you have access to the FormMail
    // Computation Module and you want to use advanced features in your
    // templates.
    //
    // If you set this to true and do not have access to the FormMail Computation
    // Module, an error will be generated.
    //
define("ADVANCED_TEMPLATES",false);		// set to true for advanced templates

	//
	// ** OPTIONAL **
	// Set LIMITED_IMPORT to false if your target database understands
	// escaped quotes and newlines within CSV files.
	//
	// When formmail.php is instructed to write to a CSV file, it
	// can strip special encodings or leave them intact.
	//
	// What you want to do depends on the final destination of your
	// CSV file.  If you intend to import the CSV file into a database,
	// and the database doesn't accept these special encodings, you
	// must leave LIMITED_IMPORT set to true.
	//
	// Microsoft Access is one example of a database that doesn't
	// understand escaped quotes and newlines, so you need LIMITED_IMPORT
	// set to true.
	//
	// When LIMITED_IMPORT is true, the following transformations are made
	// on every form value before placement in the CSV file:
	//		\\		is replaced by 		\
	//		\X		is replaced by		X	where X is any character except \
	// plus
	//		control characters and multiple spaces are replaced with a single
	//		space (the means new lines are removed too)
	//
define("LIMITED_IMPORT",true);		// set to true if your database cannot
									// handle escaped quotes or newlines within
									// imported data.  Microsoft Access is one
									// example.

	//
	// ** OPTIONAL **
	// Set VALID_ENV to the environment variables the script is allowed to
	// report.  No need to change.
	//
$VALID_ENV = array('HTTP_REFERER','REMOTE_HOST','REMOTE_ADDR','REMOTE_USER',
				'HTTP_USER_AGENT');

	//
	// ** OPTIONAL **
	// Set FILEUPLOADS to true if you want to allow forms to upload files.
	// Leave at false to prevent file attachments in your emails or file
    // storage on the server.
	//
	// This is a security measure.  Setting to false prevents attackers from
	// using your FormMail to send you malicious file attachments or saving
    // files on your server.
    //
    // The php.ini and httpd.conf files can set file_uploads to false to
    // disable file uploading.  You cannot override a false setting in
    // these files.
	//
define("FILEUPLOADS",false);		// set to true to allow file attachments

	//
	// ** OPTIONAL **
	// Set MAX_FILE_UPLOAD_SIZE to the maximum size you want to allow for a file
    // upload.  Setting this to 0 means that the HTML form or and the PHP
    // configuration (upload_max_filesize) on your server specify the limit.
    //
    // Specify MAX_FILE_UPLOAD_SIZE in kilobytes.  For example, "4" means
    // 4 kilobytes, which is 4096 bytes (4 * 1024).
	//
	// You can set this in the HTML form (MAX_FILE_SIZE), but it's easily
    // overridden by an attacker.
    //
    // You can also set this in the php.ini or httpd.conf if you have access
    // to these files. If you don't have access to these files, then you can't
    // successfully set a *larger* size below (these files provide a hard upper
    // limit that a PHP script cannot override).
    //
    // But if you want a *smaller* size than specified in php.ini and httpd.conf
    // then you can set MAX_FILE_UPLOAD_SIZE to that smaller amount and FormMail
    // will enforce the smaller limit.
	//
define("MAX_FILE_UPLOAD_SIZE",0);		// default of 0 means that other software
                                        // controls the maximum file upload size
                                        // (FormMail doesn't test the file size)

	//
	// ** OPTIONAL **
	// Set $FILE_REPOSITORY to the directory path on your server where uploaded
    // files are to be stored.  If you set this to a directory path, then
    // uploaded files are saved there instead of being attached to the email.
    //
    // Setting to an empty string disables the server-side storage and uploaded
    // files are sent by email as an attachment.
    //
$FILE_REPOSITORY = "";

	//
	// ** OPTIONAL **
	// Set FILE_MODE to the permission mode you want for files saved
    // to $FILE_REPOSITORY.
    //
    // To understand the valid values, you can read about the "chmod" command
    // on any Linux system. This page is also helpful: http://www.php.net/chmod
    //
    // Useful values:
    //      0664        read-write by owner and group, read by others
    //      0666        read-write by everyone
    //      0444        read-only by everyone
    //      0644        read-write by owner, read by everyone else
    //      0           don't set the protection mode (skips setting)
    //
    // Remember that uploaded files may be owned by "apache" or "nobody".
    //
    // FILE_MODE may have no effect on Windows servers.
    //
define("FILE_MODE",0664);     // always precede with 0 to specify octal!

	//
	// ** OPTIONAL **
	// Set FILE_OVERWRITE to false to prevent files being overwritten when
    // saved to $FILE_REPOSITORY.
    //
    // The default value of true selects the behaviour in previous
    // versions of FormMail, where uploaded files with the same name
    // will overwrite previously uploaded files.
    //
define("FILE_OVERWRITE",true);

	//
	// ** OPTIONAL **
	// Set $NEXT_NUM_FILE to a file on your server the FormMail can use
    // to generate unique numbers. This supports the %nextnum% feature in
    // derived fields and allows you to use unique numbers for various
    // purposes in your forms.
    //
    // In general, FormMail generates sequential numbers using this file.
    // The sequence may skip numbers in the case of errors and some other
    // situations, so you shouldn't rely on the generated numbers not having
    // gaps.
    //
    // The file contains a single text line.  You can change the number manually
    // but be careful!
    //
    // In general, for security reasones, the file should not be acessible
    // from the web.  So, try to place it above your document root or protect
    // it with a .htaccess file (for Apache).
    //
    // Setting to an empty string disables the %nextnum% feature.
    //
	// NOTE: you'll need to create the file on your server and make
	// it writable by the web server software.  For security reasons,
	// FormMail cannot do this for you.
	// In general, the correct permissions for your file are:
	//	rw-rw-rw-
    //
    // Create it as an empty file.
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\logs"
    // or
    //      "d:/path/to/logs"
    //
    // NOTE: this feature requires the use of PHP's "flock" function for locking
    // the next number file. Some systems, especially some Windows versions
    // (such as Windows 98, and the FAT file system) do not support file
    // locking.  An alert message should be generated on these systems indicating
    // that the feature is not supported.
    //
$NEXT_NUM_FILE = "";

	//
	// ** OPTIONAL **
	// Set PUT_DATA_IN_URL to false if you want to prevent FormMail
	// from placing data in the URL when redirecting to bad_url.
	//
	// The default value is "true" and will work fine for forms with a small
	// amount of data (less than 2000 bytes, approximately.)
	//
	// However, URLs have a finite length that's dependent on the user's
	// browser.  If you've got forms with large amounts of data, then
	// a redirect to bad_url will probably cause an error display to
	// the user, for example:
	//		Cannot find server or DNS Error
	//
	// By setting PUT_DATA_IN_URL to false, you avoid this problem.
	//
	// In any case, error information and the data submitted in the form will
	// be placed in PHP session variables.
	//
	// So, if your bad_url target is written in PHP and your PHP version is
	// sufficient to handle sessions correctly, you'll be fine with
	// PUT_DATA_IN_URL set to false.  (As always, test thoroughly!)
	//
	// Otherwise, you'll need to keep PUT_DATA_IN_URL set to true and your
	// forms will need to be small.
	//
define("PUT_DATA_IN_URL",true);	// set to true to place data in the URL
									// for bad_url redirects

	//
	// ** LEAVE **
	// Set DB_SEE_INPUT to true for debugging purposes only.  If set to
	// true the script does nothing except generate a page showing you what
	// it will do.
	//
define("DB_SEE_INPUT",false);		// set to true to just see the input values

	//
	// ** LEAVE **
	// Set DB_SEE_INI to true for debugging purposes only.  If set to
	// true the script does nothing except generate a page showing you what
	// it found in the $FORM_INI_FILE file.
	//
define("DB_SEE_INI",false);		// set to true to just see the ini file

	//
	// ** OPTIONAL **
	// Set MAXSTRING to limit the maximum length of any value accepted
	// from the form.  Increase this if you have TEXTAREAs in your forms
	// and you want users to be able to enter lots of data.
	// This value has no effect on file upload size.
	//
define("MAXSTRING",1024);         	// maximum string length for a value

	//
	// ** OPTIONAL **
	// Set $bShowMesgNumbers to true to set message numbers on.
    // if message numbers are shown then every message from FormMail
    // as [Mnnn] displayed with it, where nnn is the message number.
    // The message number is useful if:
    //  - you use a language other than English and you need to contact
    //    us (who only speak English) to tell us the exact messages being
    //    issued by FormMail,
    //  or
    //  - you prefer to know the precise error message being produced
    //    regardless of the text (for example, for searching the FormMail
    //    source for the occurrence of the message)
    //
    // Initially, FormMail always showed message numbers.  However, several
    // customers found this annoying and, so, we've made it optional with
    // the default being "off".
	//
$bShowMesgNumbers = false;

	//
	// ** OPTIONAL **
	// Set FILTERS to the filter programs you want to support.
	// A filter program is used to process the data before sending in email.
	// For example, an encryption program can be used to encrypt the mail.
	// Note that formmail.php changes to the directory of the filter program
	// before running the filter, so file name arguments are relative
	// to that directory.
	//
	// The format for each filter program is:
	//		"name"=>"program path [program options]"
	// Here's an example:
	//		$FILTERS = array("encode"=>"$REAL_DOCUMENT_ROOT/cgi-bin/fmencoder");
	//
	// This says that when the form specifies a 'filter' value of
	// "encode", run the email through this program:
	//		$REAL_DOCUMENT_ROOT/cgi-bin/fmencoder
	//
	// You can use the special variable $REAL_DOCUMENT_ROOT to refer
	// to the top of your web server directory.
	// The program can also be outside of the web server directory, e.g.:
	//		/home/yourname/bin/fmencoder
	//
	// The default value below is ready for use with FormMailEncoder.
	// FormMailEncoder allows your form results to be strongly encrypted
	// before being mailed to you.
	//
	// Use this to collect credit card payments from your customers or
	// just to keep their details private.
	//
	// You need our FormMailDecoder product to decrypt these messages.
	// You can purchase FormMailDecoder and FormMailEncoder
	// from us at http://www.tectite.com.
	//
	// The settings below have no effect unless your HTML forms request
	// their use. So, you can leave them set to the values below.
    //
    // Please note that on Windows servers, you can use '/' to separate
    // directory names.  But, if you use '\', then you must double it
    // like this:
    //      "encode"=>"d:\\websites\\yoursite\\fmencoder -kpubkey.txt"
    // or
    //      "encode"=>"d:/websites/yoursite/fmencoder -kpubkey.txt"
	//
    //
    // Note: the "null" filter does nothing to the message.
    // You can use the null filter for testing your form prior to changing
    // to a real filter.
    // You can also use the null filter to attach the form submission to the
    // email instead of having it in the body of the email (use the
    // filter_options "Attach=filename" feature).
    //
$FILTERS = array("encode"=>"$REAL_DOCUMENT_ROOT/cgi-bin/fmencoder -kpubkey.txt",
                "null"=>"null");

	//
	// ** OPTIONAL **
	// Set SOCKET_FILTERS to filter programs you want to access via HTTP
	// or HTTPS connections.
	//
	// Server Restrictions
	// ~~~~~~~~~~~~~~~~~~~
	//
	// Some server setups prevent the execution of external programs.
	// Provided you can execute cgi-bin programs from a web browser (i.e.
	// an HTTP connection), we've provided a workaround for this situation.
	// FormMail can execute your cgi-bin filter program using an HTTP (or,
	// if your PHP is configured correctly, an HTTPS) connection.
	//
	// Note: this is supported by fmencoder version 1.4 and above only.
	//
	// To execute fmencoder via HTTP, do this:
	//	1. Change the "site" value for "httpencode" to your site's web
	//	   address.
	//	2. Upload your public key to the file "pubkey.txt" in your cgi-bin
	//	   directory (or change the "file" setting in the "params" value).
	//	3. Add this hidden field to your HTML form:
	//		<input type="hidden" name="filter" value="httpencode" />
	//
	// This is still secure because the information never leaves your
	// server in clear text form.  However, if you need to execute fmencoder
	// on another server (i.e. a server different from the one that has
	// your FormMail script), you need to use the "sslencode" filter
	// instead of the "httpencode" filter.  Contact us for assistance if
	// you require this.
	//
$SOCKET_FILTERS = array(
				 "httpencode"=>array("site"=>"YourSiteHere",
				 	"port"=>80,
					"path"=>"/cgi-bin/fmencoder",
					"params"=>array(array("name"=>"key",
							"file"=>"$REAL_DOCUMENT_ROOT/cgi-bin/pubkey.txt"))),
				 "sslencode"=>array("site"=>"ssl://YourSecureSiteHere",
				 	"port"=>443,
					"path"=>"/cgi-bin/fmencoder",
					"params"=>array(array("name"=>"key",
							"file"=>"$REAL_DOCUMENT_ROOT/cgi-bin/pubkey.txt"))),
				);

	//
	// ** OPTIONAL **
	// Set FILTER_ATTRIBS to describe the attributes of your filters.
	//
	// Supported attributes are:
	//	Strips	the filter returns a block of data, stripped of any
	//			formatting (e.g. any HTML is removed)
	//	MIME	the MIME type that the filter outputs:
	//				MIME=text/plain
	//
$FILTER_ATTRIBS = array("encode"=>"Strips,MIME=text/plain",
						"httpencode"=>"Strips,MIME=text/plain",
						"sslencode"=>"Strips,MIME=text/plain",);

	//
	// ** OPTIONAL **
	// Set CHECK_FOR_NEW_VERSION to false if you don't want FormMail
	// to check for a new version and report it to you.
	//
	// The check is made once every 3 days or if your server is rebooted (or
	// its system directory for temporary files is cleaned).
	//
	// If a new version is found, then this is reported to you via an Alert.
	//
	// FormMail attempts to create a unique file in your server's temporary
	// directory (e.g. /tmp on Linix) to record when it last performed a version
	// check.  The unique file name is derived from your $TARGET_EMAIL setting.
	//
	// If you provide a value for SCRATCH_PAD (see below), then that directory
	// is used instead of /tmp.  If your web server software cannot write
	// to your server's /tmp directory, set SCRATCH_PAD if you want version
	// checks.
    //
    // CHECK_DAYS specifies the number of days between checks (if your server
    // is rebooted, a check may be made regardless).
	//
define("CHECK_FOR_NEW_VERSION",true);
define("CHECK_DAYS",30);

	//
	// ** OPTIONAL **
	// Set SCRATCH_PAD to a directory into which FormMail can create files.
	// The SCRATCH_PAD directory must be writable by your web server software.
	// On Linux, the following mode should work:
	//		rwxrwxrwx
	//
	// If you set it, the SCRATCH_PAD directory is used for CHECK_FOR_NEW_VERSION
	// processing and any other time FormMail needs to create a temporary
	// file.  If you don't set it, then FormMail uses your system's temporary
	// directory (e.g. /tmp on Linux).
	//
	// We recommend you create the directory *above* your web server document
	// directory, if possible.  For example, if your web pages are served
	// from:
	//		/home/your-site/public_html
	// create a directory called:
	//		/home/your-site/fmscratchpad
	//
	// This more secure as no browser will be able to view the scratch pad
	// directory.
	//
	// Do not specify a system directory where other FormMail installations
	// may write to.
	//
	// We recommend specifying the full path (not a relative path) in SCRATCH_PAD.
    //
    // NOTE: on Windows servers, use '/' instead of '\' or double the
    // '\' like this:
    //      "d:\\path\\to\\scratchpad"
    // or
    //      "d:/path/to/scratchpad"
	//
$SCRATCH_PAD = "";

	//
	// ** LEAVE **
	// Set CLEANUP_TIME to the number of minutes to leave old files
    // in $SCRATCH_PAD.
	//
    // This value is only used if you setup $SCRATCH_PAD (see above).
    //
    // Under certain circumstances uploaded files may be left in the
    // $SCRATCH_PAD directory.  This can happen in a multi-page form sequence
    // when the user abandons the processing before the uploaded
    // files are processed (e.g. emailed to you).
    //
    // In this case, the uploaded files will simply remain on your
    // server in $SCRATCH_PAD until something removes them.
    //
    // By setting $CLEANUP_TIME to a non-zero value, you're telling
    // FormMail to cleanup old files automatically.
    //
    // Note that this value should be set to greater than the configured
    // PHP session time, however, this isn't always easy determine.
    //
    // So, pick a time that's larger than a reasonable maximum time for a user
    // to stop half-way through your multi-page forms.
    //
$CLEANUP_TIME = 60;     // cleanup time in minutes

	//
	// ** LEAVE **
    // CLEANUP_CHANCE is the percentage probability (chance) that a given
    // FormMail execution will perform a cleanup.
    //
    // Cleanup processing incurs significant overhead, so setting this to
    // 100 would make every form submission incur that cost.  We recommend a
    // value between 10 and 30.
    //
    // The default value of 20% is a good compromise.
    //
$CLEANUP_CHANCE = 20;     // percentage probability that cleanup will be performed

	//
	// ** OPTIONAL **
	// If you need to use an outgoing mail server other than the one configured
	// directly for PHP, *and* your PHP installation has PEAR support,
	// you can configure FormMail to use PEAR's "Mail" object to send
	// mail.
	//
	// To do this, you need to set $PEAR_SMTP_HOST to the name of the
	// outgoing mail server.  The default port for SMTP is 25, but you
	// can specify a different one if required.
	// If you don't need authentication, leave $PEAR_SMTP_USER blank,
	// otherwise, set it to the user name and set $PEAR_SMTP_PWD to the
	// required password.  Note that servers frequently require a complete
	// email address for $PEAR_SMTP_USER (e.g. "russellr@rootsoftware.com"
	// instead of just "russellr").
	//
	// When using PEAR, emails seem to require a sender (a 'From' address).
	// Therefore, you may need to set "$FROM_USER" (above) to get alert messages
	// to work.
	//
	// Note that with PEAR mailing enabled, the SendMailFOption "mail_options"
	// setting is ignored (and so is SENDMAIL_F_OPTION).
	//
	// Test your PEAR settings with the "testalert" feature:
	//		http://yoursite.com/formmail.php?testalert=1
	//
$PEAR_SMTP_HOST = "";
$PEAR_SMTP_PORT = 25;
$PEAR_SMTP_USER = "";
$PEAR_SMTP_PWD = "";

	//
	// ** OPTIONAL **
	// Set ALERT_ON_USER_ERROR to false if you don't want FormMail
	// to send you an alert when a user error (e.g. missing field) occurs
	// on your forms.
	// We recommend you leave this "true" while you debug your forms and
	// either leave it that way or set it to "false" for your production
	// environment.
	//
define("ALERT_ON_USER_ERROR",true);

	//
	// ** OPTIONAL **
	// Set ENABLE_ATTACK_DETECTION to false if you don't want FormMail
	// to try to detect an attack designed to abuse your server.
    //
    // The only reason you may want to set this to false is if you're
    // testing FormMail's attack detection features.
    //
    // FormMail has never been vulnerable to any of the attacks that it
    // can detect.  The *purpose* of attack detection is merely to prevent
    // it from sending you an annoying alert whenever an attack happens.
	//
    // If you're using our FormMail, the only effect of this attack is one
    // or more annoying alert messages (your server is safe).
    //
define("ENABLE_ATTACK_DETECTION",true);

	//
	// ** OPTIONAL **
	// Set ALERT_ON_ATTACK_DETECTION to true if you want FormMail
	// to send you an alert when it detects an attack designed to
    // abuse your server.
	// If you set this to true, you may get lots of alert messages
    // each time an attack occurs.
	//
define("ALERT_ON_ATTACK_DETECTION",false);

	//
	// ** LEAVE **
	// Set ATTACK_DETECTION_MIME to false if you don't want FormMail's
    // attack detection to check for the MIME attack.
    // The MIME attack is where the recipient's address is carefully
    // crafted to try to fool FormMail into sending an with a virus
    // or other malware file attached.
	//
define("ATTACK_DETECTION_MIME",true);

	//
	// ** OPTIONAL **
	// Set $ATTACK_DETECTION_DUPS to the list of fields on your forms
    // that should *not* have duplicate values.
    //
    // One annoying attack on HTML forms scripts is to submit an email address in
    // every field, with the aim of getting the script to send email to
    // someone via your server.
    //
    // If you use one form on your server, just list some or all of the fields
    // that should never contain duplicate data.  For example, a person's
    // name is never the same as their address or their email address.
    //
    // If you use more than one form, you can list fields from each of
    // them or just use a common set.
    //
    // FormMail ignores empty or missing fields when performing this particular
    // abuse detection.  This means listing field names you don't actually
    // have on a form is OK.
    //
    // If you don't want FormMail to perform this particular attack detection,
    // set it to an empty array like this:
    //      $ATTACK_DETECTION_DUPS = array();
	//
    // Following is a list of common fields you might want FormMail to check
    // for duplicate data.  Use this unless you think it's valid for a user to put
    // the same data in *any* of these fields.  If your fields have different
    // names, change the names.
    //
    // Do not list checkbox, radio button, or select fields that have
    // simple values such as "yes", "no", "0", "1".  Only list fields
    // that will have long and unique values.
    //
$ATTACK_DETECTION_DUPS = array("realname","address1","address2","country","zip",
                                "phone","postcode","state","email");

	//
	// ** LEAVE **
	// Set ATTACK_DETECTION_SPECIALS to false if you don't want FormMail's
    // attack detection to check for the "email address in a special field"
    // attack.
	//
define("ATTACK_DETECTION_SPECIALS",true);

	//
	// ** OPTIONAL **
    // Set $GEOIP_LIC to the license key for your GeoIP account.
    // GeoIP provides geographical positioning and other information
    // about an IP address.  You can use this for helping to detect
    // credit card fraud, for example, by locating the form submitter's
    // IP address and comparing it with their stated address (For example,
    // "John Smith" submits your form and claims to be in Sydney
    // Australia.  But the GeoIP information indicates his actual IP address
    // is in Pakistan!)
    // For more information about GeoIP, go to:
    //  http://www.tectite.com/geoip.php
    //
$GEOIP_LIC = "";        // default - no GeoIP

	//
	// ** OPTIONAL **
	// Set ZERO_IS_EMPTY to false if you don't want a field containing
    // exactly "0" (without the quotes) to be treated as empty.
    //
    // The default behaviour of PHP is to treat a field containing "0" as empty
    // and this behaviour is what FormMail mimics by default.
    //
    // In many cases this is what you would want for a web form.
    //
    // By setting ZERO_IS_EMPTY to false, then a field must be completely
    // empty to be treated as such.
    //
    // This setting affects "required" testing, "derived_fields" + operator,
    // "conditions" testing, and template filling.
    //
    // References:
    //  http://au2.php.net/empty
    //  http://aspn.activestate.com/ASPN/docs/PHP/migration4.empty.html
    //
    // If you're upgrading FormMail through the Upgrade Wizard, the setting
    // will be set to "true" to replicate previous behaviour.  New FormMail
    // downloads get the setting as "false".
    //
define("ZERO_IS_EMPTY",false);

	//
	// ** OPTIONAL **
	// Set SESSION_NAME to a non-empty string to get a unique PHP session for
    // your FormMail processing.  You only need to do this if your site
    // is a PHP-based site that uses sessions.
    //
    // FormMail attaches to or creates a PHP session so it can pass error
    // information to bad_url.  On succcessful completion, and if you're not
    // using good_url, FormMail destroys the session.  If you use the default
    // PHP session name on your site and within FormMail, this will cause any
    // session information from your site to be discarded.
    //
    // In summary, you'll only have a problem with sessions, and need to
    // set $SESSION_NAME if *all* the following statements are true:
    //  1. Your website uses PHP sessions.
    //  2. Your website's PHP session name is the default for PHP.
    //  3. You do not specify "good_url" in your HTML form
    //
    // By specifying a unique name here, you avoid this problem.  You should set
    // the same name in FMBadHandler too, if you're using that script.
    // Also, VerifyImg.php if you're using that.
    //
$SESSION_NAME = "";

	//
	// ** OPTIONAL **
	// Set $HOOK_DIR to a directory path on your server where you store
    // include files for the FormMail Hook System.
    //
    // Note that this setting has to be a directory (folder) path, not a URL.
    //
    // If set to an empty string (the default), the Hook System is disabled.
    //
$HOOK_DIR = "";

/* UPGRADE CONTROL
**
** FILTER_ATTRIBS:lt:4.00:no_keep:The FILTER_ATTRIBS configuration has
** been modified to include new information about the standard filters.:
**
** SET_REAL_DOCUMENT_ROOT:gt:4.07:copy_from=REAL_DOCUMENT_ROOT:The
** REAL_DOCUMENT_ROOT configuration has been renamed to SET_REAL_DOCUMENT_ROOT.:
**
** EMAIL_NAME:lt:6.01:no_keep:The EMAIL_NAME configuration has
** been modified to match hyphens ('-') in email addresses.:
**
** ZERO_IS_EMPTY:le:6.01:set_to=true:ZERO_IS_EMPTY has been
** set to a value that duplicates previous behaviour.:
**
** END OF CONTROL
*/

/*****************************************************************************/
/* END OF CONFIGURATION (do not alter this line in any way!!!)               */
/*****************************************************************************/
    //
    // Hook system: before initialization (but after configuration)
    //
if ($HOOK_DIR !== "")
    @include("$HOOK_DIR/fmhookpreinit.inc");

if (!empty($SESSION_NAME))
    session_name($SESSION_NAME);

session_start();

function ZapSession()
{
	session_destroy();
}

if ($bUseOldVars)
	$aSessionVars = &$HTTP_SESSION_VARS;
else
	$aSessionVars = &$_SESSION;

$aSessionVars["FormError"] = NULL;
unset($aSessionVars["FormError"]);          		// start with no error
$aSessionVars["FormErrorInfo"] = NULL;
unset($aSessionVars["FormErrorInfo"]);          	// start with no error
$aSessionVars["FormErrorCode"] = NULL;
unset($aSessionVars["FormErrorCode"]);          	// start with no error
$aSessionVars["FormErrorItems"] = NULL;
unset($aSessionVars["FormErrorItems"]);          	// start with no error
$aSessionVars["FormData"] = NULL;
unset($aSessionVars["FormData"]);        		  	// start with no data
$aSessionVars["FormIsUserError"] = NULL;
unset($aSessionVars["FormIsUserError"]);        	// start with no data
$aSessionVars["FormAlerted"] = NULL;
unset($aSessionVars["FormAlerted"]);        		// start with no data

//
// Note that HTTP_REFERER is easily spoofed, so there's no point in
// using it for security.
//

    //
    // SPECIAL_FIELDS is the list of fields that formmail.php looks for to
	// control its operation
    //
$SPECIAL_FIELDS = array(
		"email",   		// email address of the person who filled in the form
        "realname", 	// the real name of the person who filled in the form
        "recipients",   // comma-separated list of email addresses to which we'll send the results
        "cc",  			// comma-separated list of email addresses to which we'll CC the results
        "bcc",  		// comma-separated list of email addresses to which we'll BCC the results
        "required",     // comma-separated list of fields that must be found in the input
        "conditions",   // complex condition tests
        "fmcompute",    // computations
        "fmmodules",    // list of modules required
		"mail_options",	// comma-separated list of options
        "good_url",     // URL to go to on success
        "good_template",// template file to display on success
        "bad_url",      // URL to go to on error
        "bad_template", // template file to display on error
        "template_list_sep", // separator when expanding lists in templates
        "this_form",	// the URL of the form (can be used by bad_url)
        "subject",      // subject for the email
        "env_report",   // comma-separated list of environment variables to report
		"filter",		// a supported filter to use
		"filter_options",// options for using the filter
		"filter_fields",// list of fields to filter (default is to filter all fields)
		"logfile",		// log file to write to
		"csvfile",		// file to write CSV records to
		"csvcolumns",	// columns to save in the csvfile
		"crm_url",		// URL for sending data to the CRM; note that the
						// value must have a valid prefix specified in TARGET_URLS
		"crm_spec",		// CRM specification (field mapping)
		"crm_options",	// comma-separated list of options to control CRM processing
		"derive_fields", // a list of fields to derive from other fields
		"file_names",   // specifies names for files being uploaded
		"autorespond",	// specification for auto-responding
		"arverify",		// verification field to allow auto-responding
		"imgverify",    // verification field to allow submission
        "multi_start",  // set this field on the first page of a multi-page form sequence
        "multi_keep",   // set this field on the pages of a multi-page form sequence
                        // to the list of fields that should be kept when moving
                        // forward after going backwards
        "next_form",    // next form name or empty for last form
        "multi_go_back",// this field should be set when the user clicks the
                        // back button or link in a multi-page form sequence
        "alert_to");    // email address to send alerts (errors) to

	//
	// $SPECIAL_MULTI is the list of fields from $SPECIAL_FIELDS that can
	// have multiple values, for example:
	//		name="conditions1"
	//		name="conditions2"
	//
$SPECIAL_MULTI = array(
		"conditions",
		"fmcompute",
		);

	//
	// $SPECIAL_NOSTRIP is the list of fields from $SPECIAL_FIELDS that
	// should not be stripped (other than for magic_quotes_gpc reasons).
	//
$SPECIAL_NOSTRIP = array(
		"conditions",
        "fmcompute",
		);

    //
	// VALID_MAIL_OPTIONS lists the valid mail_options words
	//
$VALID_MAIL_OPTIONS = array(
		"AlwaysList"=>true,
		"CharSet"=>true,
		"DupHeader"=>true,
		"Exclude"=>true,
		"FromAddr"=>true,
		"HTMLTemplate"=>true,
		"KeepLines"=>true,
		"NoEmpty"=>true,
		"NoPlain"=>true,
		"PlainTemplate"=>true,
		"SendMailFOption"=>true,
		"StartLine"=>true,
		"TemplateMissing"=>true,
		);

    //
	// VALID_CRM_OPTIONS lists the valid crm_options words
	//
$VALID_CRM_OPTIONS = array(
		"ErrorOnFail"=>true,
		);

    //
	// VALID_AR_OPTIONS lists the valid autorespond words
	//
$VALID_AR_OPTIONS = array(
		"Subject"=>true,
		"HTMLTemplate"=>true,
		"PlainTemplate"=>true,
		"TemplateMissing"=>true,
		);

    //
	// VALID_FILTER_OPTIONS lists the valid filter_options words
	//
$VALID_FILTER_OPTIONS = array(
		"Attach"=>true,
        "KeepInLine"=>true,
		);

    //
    // SPECIAL_VALUES is set to the value of the fields we've found
    //  usage: $SPECIAL_VALUES["email"] is the value of the email field
    //
$SPECIAL_VALUES = array();
	//
	// Array of mail options; set by the function 'ProcessMailOptions'
	//
$MAIL_OPTS = array();
	//
	// Array of crm options; set by the function 'ProcessCRMOptions'
	//
$CRM_OPTS = array();
	//
	// Array of autorespond options; set by the function 'ProcessAROptions'
	//
$AR_OPTS = array();
	//
	// Array of filter options; set by the function 'ProcessFilterOptions'
	//
$FILTER_OPTS = array();

 	//
	// initialise $SPECIAL_VALUES so that we don't fail on using unset values
	//
foreach ($SPECIAL_FIELDS as $sFieldName)
	$SPECIAL_VALUES[$sFieldName] = "";

	//
	// Special defaults for some fields....
	//
$SPECIAL_VALUES['template_list_sep'] = ",";

    //
    // FORMATTED_INPUT contains the input variables formatted nicely
	// This is used for error reporting and debugging only.
    //
$FORMATTED_INPUT = array();

	//
	// $FILTER_ATTRIBS_LOOKUP is the parsed $FILTER_ATTRIBS array
	//
$FILTER_ATTRIBS_LOOKUP = array();

    //
    // $EMAIL_ADDRS is the array of email addresses from the $FORM_INI_FILE
    //
$EMAIL_ADDRS = array();

	//
	// Access the www.tectite.com website to get the current version.
	//
function CheckVersion()
{
	global	$FM_VERS;

@	$fp = fopen("http://www.tectite.com/fmversion.txt","r");
	if ($fp !== false)
	{
			//
			// version file looks like this:
			//		Version=versionumber
			//		Message=a message to send in the alert
			//
		$s_version = "";
		$s_message = "";
		$s_line = "";
		$b_in_mesg = false;
		while (!feof($fp))
		{
			$s_line = fgets($fp,1024);
			if ($b_in_mesg)
				$s_message .= $s_line;
			else
			{
				$s_prefix = substr($s_line,0,8);
				if ($s_prefix == "Message=")
				{
					$s_message .= substr($s_line,8);
					$b_in_mesg = true;
				}
				elseif ($s_prefix == "Version=")
					$s_version = substr($s_line,8);
			}
		}
		fclose($fp);
		$s_version = str_replace("\r","",$s_version);
		$s_version = str_replace("\n","",$s_version);
		$s_stop_mesg = GetMessage(MSG_END_VERS_CHK);
		if ((float) $s_version > (float) $FM_VERS)
			SendAlert(GetMessage(MSG_VERS_CHK,array(
						"TECTITE"=>"www.tectite.com",
						"FM_VERS"=>"$FM_VERS",
						"NEWVERS"=>$s_version,
						))."\n$s_message\n$s_stop_mesg",true,true);
	}
}

	//
	// Check for new FormMail version
	//
function Check4Update($s_chk_file,$s_id = "")
{
	global	$lNow,$php_errormsg;

@	$l_last_chk = filemtime($s_chk_file);
	if ($l_last_chk === false || $lNow - $l_last_chk >= (CHECK_DAYS*24*60*60))
	{
		CheckVersion();
			//
			// update the check file's time stamp
			//
	@	$fp = fopen($s_chk_file,"w");
		if ($fp !== false)
		{
			fwrite($fp,"FormMail version check ".
				(empty($s_id) ? "" : "for identifier '$s_id' ").
				"at ".date("H:i:s d-M-Y",$lNow)."\n");
			fclose($fp);
		}
		else
			SendAlert(GetMessage(MSG_CHK_FILE_ERROR,array("FILE"=>$s_chk_file,
                            "ERROR"=>CheckString($php_errormsg))));
	}
}

	//
	// Perform various processing at the end of the script's execution.
	//
function OnExit()
{
	global	$TARGET_EMAIL,$CHECK_FILE;

		//
		// Check the www.tectite.com website for a new version, but only
		// do this check once every 3 days (or on server reboot).
		//
	if (CHECK_FOR_NEW_VERSION)
	{
		global	$SERVER;

		if (isset($TARGET_EMAIL[0]))
		{
				//
				// use the first few characters of the MD5 of first email
				// address pattern from $TARGET_EMAIL to get a unique file
				// for the server
				//
			$s_id = "";
			if (isset($SERVER) && !empty($SERVER))
				$s_id = $SERVER;
			$s_dir = GetTempDir();
			$s_md5 = md5($TARGET_EMAIL[0]);
			$s_uniq = substr($s_md5,0,6);
			$s_chk_file = "fm"."$s_uniq".".txt";
			Check4Update($s_dir."/".$s_chk_file,$s_id);
		}
	}
}

register_shutdown_function('OnExit');

	//
	// Return the array with each string urlencode'd.
	//
function URLEncodeArray($a_array)
{
	foreach ($a_array as $m_key=>$s_str)
	{
			//
			// only encode the value after the '='
			//
		if (($i_pos = strpos($s_str,'=')) !== false)
			$a_array[$m_key] = substr($s_str,0,$i_pos+1).
								urlencode(substr($s_str,$i_pos+1));
		else
			$a_array[$m_key] = urlencode($s_str);
	}
	return ($a_array);
}

	//
	// Add a parameter or list of parameters to a URL.
	//
function AddURLParams($s_url,$m_params,$b_encode = true)
{
	if (!empty($m_params))
	{
		if (!is_array($m_params))
			$m_params = array($m_params);
		if (strpos($s_url,'?') === false)
			$s_url .= '?';
		else
			$s_url .= '&';
		$s_url .= implode('&',($b_encode) ? URLEncodeArray($m_params) : $m_params);
	}
	return ($s_url);
}

	//
	// Recursively trim an array of strings (non string values are converted
	// to a string first).
	//
function TrimArray($a_list)
{
	foreach ($a_list as $m_key=>$m_item)
		if (is_array($m_item))
			$a_list[$m_key] = TrimArray($m_item);
		elseif (is_scalar($m_item))
			$a_list[$m_key] = trim("$m_item");
		else
			$a_list[$m_key] = "";
	return ($a_list);
}

	//
	// Parse a derivation specification and return an array of
	// field names and operators.
	//
function ParseDerivation($a_form_data,$s_fld_spec,$s_name,&$a_errors)
{
	$a_deriv = array();
	while (($i_len = strlen($s_fld_spec)) > 0)
	{
			//
			// we support the following operators:
			//		+	concatenate with a single space between, but skip the space
			//			if the next field is empty
			//		*	concatenate with a single space between
			//		.	concatenate with no space between
			//
		$i_span = strcspn($s_fld_spec,'+*.');
		if ($i_span == 0)
		{
			$a_errors[] = $s_name;
			return (false);
		}
		$a_deriv[] = trim(substr($s_fld_spec,0,$i_span));
		if ($i_span < $i_len)
		{
			$a_deriv[] = substr($s_fld_spec,$i_span,1);
			$s_fld_spec = substr($s_fld_spec,$i_span+1);
		}
		else
			$s_fld_spec = "";
	}
	return ($a_deriv);
}

    //
    // Test if a character is an alphabetic.
    //
function IsAlpha($ch)
{
    return (strpos("abcdefghijklmnopqrstuvwxyz",strtolower($ch)) !== false);
}

    //
    // Test if a character is a digit.
    //
function IsNumeric($ch)
{
    return (strpos("0123456789",$ch) !== false);
}

    //
    // Test if a character is an alphanumeric
    //
function IsAlnum($ch)
{
    return (IsAlpha($ch) || IsNumeric($ch));
}

    //
    // Return an array of tokens extracted from the given string.
    // A token is:
    //  - a word (begins with alpha or _, and is followed by any number
    //    of alphanumerics or _ chars)
    //  - a number (any number of consecutive digits with up to one period)
    //  - a string enclosed in specified quotes (this can be disabled)
    //  - any punctuation character
    //
    // Anything not matching the above is silently ignored!
    //
function GetTokens($s_str,$s_quotes = "'\"")
{
    $b_allow_strings = ($s_quotes !== "") ? true : false;
    $ii = 0;
    $i_len = strlen($s_str);
    $a_toks = array();

    while ($ii < $i_len)
    {
        switch ($ch = $s_str{$ii})
        {
        case " ":
        case "\t":
        case "\n":
        case "\r":
            $ii++;
            continue;
        }
            //
            // start of a token
            //
        $i_start = $ii;
        if ($ch == "_" || IsAlpha($ch))
        {
                //
                // a word
                //
            $i_count = 1;
            while (++$ii < $i_len &&
                   ($s_str{$ii} == "_" || IsAlnum($s_str{$ii})))
                ++$i_count;
            $a_toks[] = substr($s_str,$i_start,$i_count);
        }
        elseif (($ch == "." && $ii < ($i_len-1) && IsNumeric($s_str{$ii+1}))||
                IsNumeric($ch))
        {
                //
                // a number
                //
            $b_had_dot = ($ch == ".");
            $i_count = 1;
            while (++$ii < $i_len)
            {
                if (IsNumeric($s_str{$ii}))
                    ++$i_count;
                elseif ($s_str{$ii} == "." && !$b_had_dot)
                {
                    ++$i_count;
                    $b_had_dot = true;
                }
                else
                    break;
            }
            $a_toks[] = substr($s_str,$i_start,$i_count);
        }
        elseif ($b_allow_strings && strpos($s_quotes,$ch) !== false)
        {
            $c_quote = $ch;
                //
                // a quoted string
                //
            while (++$ii < $i_len)
            {
                if ($s_str{$ii} == $c_quote)
                {
                    ++$ii;  // include the terminating quote
                    break;
                }
            }
            $a_toks[] = substr($s_str,$i_start,$ii-$i_start);
        }
        else
        {
            $s_punct = "~!@#$%^&*()-+={}[]|:;<>,.?/`\\";
            if (!$b_allow_strings)
                $s_punct .= "'\"";
            if (strpos($s_punct,$ch) !== false)
                $a_toks[] = $ch;
            ++$ii;
        }
    }
    return ($a_toks);
}

	//
	// Return the value from a derive_fields specification.
	// Specifications are in this format:
	//		%info%
	// where info is a predefined word or a literal in quotes
	// (e.g. 'the time is ')
	//
function ValueSpec($s_spec,$a_form_data,&$a_errors)
{
	global	$lNow;

	$s_value = "";
	switch (trim($s_spec))
	{
	case 'date':		// "standard" date format: DD-MMM-YYYY
		$s_value = date('d-M-Y',$lNow);
		break;
	case 'time':		// "standard" time format: HH:MM:SS
		$s_value = date('H:i:s',$lNow);
		break;
	case 'ampm':		// am or pm
		$s_value = date('a',$lNow);
		break;
	case 'AMPM':		// AM or PM
		$s_value = date('A',$lNow);
		break;
	case 'dom0':		// day of month with possible leading zero
		$s_value = date('d',$lNow);
		break;
	case 'dom':			// day of month with no leading zero
		$s_value = date('j',$lNow);
		break;
	case 'day':			// day name (abbreviated)
		$s_value = date('D',$lNow);
		break;
	case 'dayname':		// day name (full)
		$s_value = date('l',$lNow);
		break;
	case 'daysuffix':	// day number suffix for English (st for 1st, nd for 2nd, etc.)
		$s_value = date('S',$lNow);
		break;
	case 'moy0':		// month of year with possible leading zero
		$s_value = date('m',$lNow);
		break;
	case 'moy':			// month of year with no leading zero
		$s_value = date('n',$lNow);
		break;
	case 'month':		// month name (abbreviated)
		$s_value = date('M',$lNow);
		break;
	case 'monthname':	// month name (full)
		$s_value = date('F',$lNow);
		break;
	case 'year':		// year (two digits)
		$s_value = date('y',$lNow);
		break;
	case 'fullyear':	// year (full)
		$s_value = date('Y',$lNow);
		break;
	case 'rfcdate':		// date formatted according to RFC 822
		$s_value = date('r',$lNow);
		break;
	case 'tzname':		// timezone name
		$s_value = date('T',$lNow);
		break;
	case 'tz':			// timezone difference from Greenwich +NNNN or -NNNN
		$s_value = date('O',$lNow);
		break;
	case 'hour120':		// hour of day (01-12) with possible leading zero
		$s_value = date('h',$lNow);
		break;
	case 'hour240':		// hour of day (00-23) with possible leading zero
		$s_value = date('H',$lNow);
		break;
	case 'hour12':		// hour of day (1-12) with no leading zero
		$s_value = date('g',$lNow);
		break;
	case 'hour24':		// hour of day (0-23) with no leading zero
		$s_value = date('G',$lNow);
		break;
	case 'min':			// minute of hour (00-59)
		$s_value = date('i',$lNow);
		break;
	case 'sec':			// seconds of minute (00-59)
		$s_value = date('s',$lNow);
		break;
	default:
		if ($s_spec{0} == "'")
		{
				//
				// to get a quote, use 3 quotes:
				//		'''
				//
			if ($s_spec == "'''")
				$s_value = "'";
			elseif (substr($s_spec,-1,1) == "'")
				$s_value = substr($s_spec,1,-1);
			else
					//
					// missing final quote is OK
					//
				$s_value = substr($s_spec,1);
		}
		elseif (strspn($s_spec,"0123456789ABCDEF") == 2)
		{
				//
				// insert the ASCII character corresponding to
				// the hexadecimal value
				//
			$i_val = intval(substr($s_spec,0,2),16);
			$s_value = chr($i_val);
		}
		else
        {
                //
                // look for supported functions, start by getting all
                // the tokens
                //
            $a_toks = GetTokens($s_spec);
            if (count($a_toks) > 0)
            {
                switch ($a_toks[0])
                {
                case "if":
                        //
                        // "if" function: test first field
                        //       if not empty, then use second field
                        //       else, use third field
                        //
                        // Example: if(fld1 ; fld2 ; fld3)
                        //
                        // tokens are:
                        //      1               (
                        //      2               the field name to test (first)
                        //      3               ;
                        //      4               the "then" spec (can be missing)
                        //      5               ;
                        //      6               the "else" spec (can be missing)
                        //      7               )
                        //
                    if (($n_tok = count($a_toks)) < 6 ||
                            $a_toks[1] != "(" ||
                            $a_toks[3] != ";" ||
                            $a_toks[$n_tok-1] != ")")
			            SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC_IF_FMT))));
                    else
                    {
                        $b_ok = true;
			            $s_fld_name = $a_toks[2];
                        $s_then_spec = $s_else_spec = "";
                        for ($ii = 4 ; $ii < $n_tok && $a_toks[$ii] != ';' ; $ii++)
                            $s_then_spec .= $a_toks[$ii];
                        if ($ii == $n_tok)
                            $b_ok = false;
                        else
                        {
                                //
                                // Concatenate tokens until the ')'.
                                // This provides the "else" spec.
                                //
                            for ( ; ++$ii < $n_tok && $a_toks[$ii] != ')' ; )
                                $s_else_spec .= $a_toks[$ii];
                            if ($ii == $n_tok)
                                $b_ok = false;
                        }
                        if ($b_ok)
                        {
                            if (!TestFieldEmpty($s_fld_name,$a_form_data,$s_mesg))
                                $s_fld_spec = $s_then_spec;
                            else
                                $s_fld_spec = $s_else_spec;
                            $s_value = GetDerivedValue($a_form_data,$s_fld_spec);
                        }
                        else
			                SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                            array("SPEC"=>$s_spec,
                                                  "MSG"=>GetMessage(MSG_DER_FUNC_IF_FMT))));
                    }
                    break;
                case "size":
                        //
                        // "size" function: return size of uploaded file
                        //
                        // Example: size(fieldname)
                        //
                        // tokens are:
                        //      1               (
                        //      2               the field name for the file upload
                        //      3               )
                        //
                    if (count($a_toks) != 4 ||
                            $a_toks[1] != "(" ||
                            $a_toks[3] != ")")
			            SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC_SIZE_FMT))));
                    elseif (($i_size = GetFileSize($a_toks[2])) !== false)
                        $s_value = "$i_size";
                    break;
                case "ext":
                        //
                        // "ext" function: return filename extension of uploaded file
                        //
                        // Example: ext(fieldname)
                        //
                        // tokens are:
                        //      1               (
                        //      2               the field name for the file upload
                        //      3               )
                        //
                    if (count($a_toks) != 4 ||
                            $a_toks[1] != "(" ||
                            $a_toks[3] != ")")
			            SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC_EXT_FMT))));
                    elseif (($s_name = GetFileName($a_toks[2])) !== false)
                    {
                        if (($i_pos = strrpos($s_name,".")) !== false)
                            $s_value = substr($s_name,$i_pos+1);
                    }
                    break;
                case "ucase":
                case "lcase":
                        //
                        // "ucase" and "lcase" functions: return field
                        // converted to upper or lower case
                        //
                        // Example: lcase(fieldname)
                        //
                        // tokens are:
                        //      1               (
                        //      2               the field name to convert
                        //      3               )
                        //
                    if (count($a_toks) != 4 ||
                            $a_toks[1] != "(" ||
                            $a_toks[3] != ")")
			            SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC1_FMT,
                                                    array("FUNC"=>$a_toks[0])))));
                    elseif ($a_toks[0] == "ucase")
                        $s_value = strtoupper(GetFieldValue($a_toks[2],$a_form_data));
                    else
                        $s_value = strtolower(GetFieldValue($a_toks[2],$a_form_data));
                    break;
                case "ltrim":
                case "rtrim":
                case "trim":
                        //
                        // trim functions: return field with whitespace removed
                        // from left (ltrim), right (rtrim), or both (trim)
                        // ends.
                        //
                        // Example: ltrim(fieldname)
                        //
                        // tokens are:
                        //      1               (
                        //      2               the field name to trim
                        //      3               )
                        //
                    if (count($a_toks) != 4 ||
                            $a_toks[1] != "(" ||
                            $a_toks[3] != ")")
			            SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC1_FMT,
                                              array("FUNC"=>$a_toks[0])))));
                    else
                        $s_value = $a_toks[0](GetFieldValue($a_toks[2],$a_form_data));
                    break;
                case "ltrim0":
                        //
                        // ltrim0 function: return field with blanks and
                        // leading 0's removed from the left.
                        //
                        // Example: ltrim0(fieldname)
                        //
                        // tokens are:
                        //      1               (
                        //      2               the field name to trim
                        //      3               )
                        //
                    if (count($a_toks) != 4 ||
                            $a_toks[1] != "(" ||
                            $a_toks[3] != ")")
			            SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC1_FMT,
                                              array("FUNC"=>$a_toks[0])))));
                    else
                    {
                        $s_value = GetFieldValue($a_toks[2],$a_form_data);
                        $s_value = ltrim($s_value);     // trim blanks on left
                        $i_len = strspn($s_value,"0");
                            //
                            // if the whole string is zeroes, make sure we leave
                            // one of them!
                            //
                        if ($i_len == strlen($s_value))
                            if (--$i_len < 0)
                                $i_len = 0;
                        $s_value = substr($s_value,$i_len);
                    }
                    break;
                case "nextnum":
                        //
                        // "nextnum" function: return a unique number (next number)
                        //
                        // Usage: nextnum[(pad[,base])]
                        //
                        // Examples:
                        //      %nextnum%
                        //      %nextnum%
                        //      %nextnum(8)%
                        //      %nextnum(5;16)%
                        //
                        // You can provide a padding amount. In this case, the
                        // number is padded on the left with zeroes to the number
                        // of digits specified.
                        //
                        // You can also provide a base for your numbers.  Valid
                        // values for base are 2 to 36, inclusive.
                        //
                        // tokens are:
                        //      1               (
                        //      2               the padding amount
                        //      3               ;
                        //      4               the base
                        //      5               )
                        //
                    $i_pad = 0;     // no padding
                    $i_base = 10;   // base 10
                    if (($n_tok = count($a_toks)) > 1)
                    {
                        if (($n_tok != 4 && $n_tok != 6) ||
                            $a_toks[1] != "(" ||
                            $a_toks[$n_tok-1] != ")")
			                SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC_NEXTNUM_FMT)." (T1)")));
                        if ($n_tok == 6 && $a_toks[3] != ";")
			                SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC_NEXTNUM_FMT)." (T2)")));
                        if (!is_numeric($a_toks[2]) ||
                            ($n_tok == 6 && !is_numeric($a_toks[4])))
			                SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                        array("SPEC"=>$s_spec,
                                              "MSG"=>GetMessage(MSG_DER_FUNC_NEXTNUM_FMT)." (T3)")));
                        $i_pad = intval($a_toks[2]);
                        if ($n_tok == 6)
                        {
                            $i_base = intval($a_toks[4]);
                            if ($i_base < 2 || $i_base > 36)
                            {
			                    SendAlert(GetMessage(MSG_DER_FUNC_ERROR,
                                            array("SPEC"=>$s_spec,
                                                  "MSG"=>GetMessage(MSG_DER_FUNC_NEXTNUM_FMT)." (T4)")));
                                $i_base = 10;
                            }
                        }
                        $s_value = GetNextNum($i_pad,$i_base);
                    }
                    else
                    {
                        $s_value = GetNextNum($i_pad,$i_base);
                    }
                    break;
                default:
			        SendAlert(GetMessage(MSG_UNK_VALUE_SPEC,
                                    array("SPEC"=>$s_spec,"MSG"=>"")));
                    break;
                }
            }
            else
			    SendAlert(GetMessage(MSG_UNK_VALUE_SPEC,array("SPEC"=>$s_spec,
                                                            "MSG"=>"")));
        }
		break;
	}
	return ($s_value);
}

    //
    // Return the next number or fail on error
    //
function GetNextNum($i_pad,$i_base)
{
    global  $NEXT_NUM_FILE,$php_errormsg;

    if (!isset($NEXT_NUM_FILE) || $NEXT_NUM_FILE === "")
    {
        Error("next_num_config",GetMessage(MSG_NO_NEXT_NUM_FILE));
        exit;
    }
    if (($fp = @fopen($NEXT_NUM_FILE,"r+")) === false)
    {
        Error("next_num_file",GetMessage(MSG_NEXT_NUM_FILE,
                                    array("FILE"=>$NEXT_NUM_FILE,
                                        "ACT"=>"open",
                                        "ERR"=>$php_errormsg)));
        exit;
    }
    if (!flock($fp,defined("LOCK_EX") ? LOCK_EX : 2))
    {
        Error("next_num_file",GetMessage(MSG_NEXT_NUM_FILE,
                                    array("FILE"=>$NEXT_NUM_FILE,
                                        "ACT"=>"flock",
                                        "ERR"=>$php_errormsg)));
        exit;
    }
        //
        // read the first line only
        //
    if (!feof($fp))
    {
        if (($s_line = fread($fp,1024)) === false)
            $i_next = 1;
        elseif (($i_next = intval($s_line)) <= 0)
            $i_next = 1;
    }
    else
        $i_next = 1;
    if (rewind($fp) == 0)
    {
        Error("next_num_file",GetMessage(MSG_NEXT_NUM_FILE,
                                    array("FILE"=>$NEXT_NUM_FILE,
                                        "ACT"=>"rewind",
                                        "ERR"=>$php_errormsg)));
        exit;
    }
    $s_ret = strval($i_next++);
    if (fputs($fp,"$i_next\r\n") <= 0)
    {
        Error("next_num_file",GetMessage(MSG_NEXT_NUM_FILE,
                                    array("FILE"=>$NEXT_NUM_FILE,
                                        "ACT"=>"fputs",
                                        "ERR"=>$php_errormsg)));
        exit;
    }
    fclose($fp);
    if ($i_base != 10)
    {
        $s_ret = base_convert($s_ret,10,$i_base);
        $s_ret = strtoupper($s_ret);    // always upper case if alphas are used
    }
    if ($i_pad != 0)
        $s_ret = str_pad($s_ret,$i_pad,"0",STR_PAD_LEFT);
    return ($s_ret);
}

    //
    // Return the value of an object or array as a string.
    //
function GetObjectAsString($m_value)
{
    ob_start();
    print_r($m_value);
    $s_ret = ob_get_contents();
    ob_end_clean();
    return ($s_ret);
}

    //
    // Return a Server or Environment variable value.  Returns false if
    // not found, otherwise a string value.
    //
function GetEnvValue($s_name)
{
    global  $aServerVars,$aEnvVars;

    if (isset($aEnvVars[$s_name]))
        $m_value = $aEnvVars[$s_name];
    elseif (isset($aServerVars[$s_name]))
        $m_value = $aServerVars[$s_name];
        //
        // some values might not be strings - so convert
        //
    if (isset($m_value) && !is_scalar($m_value))
        $m_value = GetObjectAsString($m_value);
    return (isset($m_value) ? ((string) $m_value) : false);
}

    //
    // Same as "empty" but checks for true emptiness if ZERO_IS_EMPTY is
    // set to false.
    //
function IsFieldEmpty($s_value)
{
    if (ZERO_IS_EMPTY || is_array($s_value))
        return (empty($s_value));
    else
        return ($s_value === "");
}

    //
    // Test if a field is set in the given vars array or in the uploaded
    // files.
    //
function IsFieldSet($s_fld,$a_main_vars)
{
    global  $aFileVars;

    return (isset($a_main_vars[$s_fld]) ||
            (FILEUPLOADS && isset($aFileVars[$s_fld])));
}

    //
    // Return the info for the uploaded file, or false on error.
    //
function GetFileInfo($s_fld)
{
    global  $aFileVars;

    if (FILEUPLOADS && isset($aFileVars[$s_fld]))
    {
        $a_upload = $aFileVars[$s_fld];
	    if (isset($a_upload['tmp_name']) && !empty($a_upload['tmp_name']) &&
            isset($a_upload['name']) && !empty($a_upload['name']) &&
		    IsUploadedFile($a_upload))
                return ($a_upload);
    }
    return (false);
}

    //
    // Return the original name of the uploaded file or false on error.
    //
function GetFileName($s_fld)
{
    if (($a_upload = GetFileInfo($s_fld)) !== false)
        return ($a_upload['name']);
    return (false);
}

    //
    // Return the size of the uploaded file or false on error.
    //
function GetFileSize($s_fld)
{
    if (($a_upload = GetFileInfo($s_fld)) !== false)
        return ($a_upload['size']);
    return (false);
}

    //
    // Return a field value.  Empty string is returned if the field is
    // not found. File fields return the original name of the uploaded file.
    //
function GetFieldValue($s_fld,$a_main_vars)
{
    if (!isset($a_main_vars[$s_fld]))
    {
        if (($s_name = GetFileName($s_fld)) === false)
            $s_name = "";
        return ($s_name);
    }
    return ((string) $a_main_vars[$s_fld]);
}

    //
    // Tests a field against an array of vars for emptyness.
    // If the var isn't found there, then the POSTed files array is checked.
    // Returns true if the field is empty (a specific error may
    // be returned in the $s_mesg parameter).
    //
function TestFieldEmpty($s_fld,$a_main_vars,&$s_mesg)
{
    global  $aFileVars;

    $s_mesg = "";
    $b_empty = TRUE;
    if (!isset($a_main_vars[$s_fld]))
    {
            //
            // Each file var is an array with these elements:
            //      'name' => The original name of the file on the client machine.
            //      'type' => The mime type of the file, if the browser provided this information.
            //      'tmp_name' => The temporary filename of the file in which the uploaded file was stored on the server.
            //      'error' => The error code associated with this file upload.
            //                  NOTE: 'error' was added in PHP 4.2.0
            //      'size' => The size, in bytes, of the uploaded file.
            //
            // Error codes (the constants are only available from PHP 4.3.0 so
            // we have to use the raw numbers):
            //	UPLOAD_ERR_OK
            //	    Value: 0; There is no error, the file uploaded with success.
            //	UPLOAD_ERR_INI_SIZE
            //	    Value: 1; The uploaded file exceeds the upload_max_filesize directive in php.ini.
            //	UPLOAD_ERR_FORM_SIZE
            //	    Value: 2; The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the html form.
            //	UPLOAD_ERR_PARTIAL
            //	    Value: 3; The uploaded file was only partially uploaded.
            //	UPLOAD_ERR_NO_FILE
            //	    Value: 4; No file was uploaded.
            //
        if (FILEUPLOADS && isset($aFileVars[$s_fld]))
        {
            $a_upload = $aFileVars[$s_fld];
			if (isset($a_upload['tmp_name']) && !empty($a_upload['tmp_name']) &&
                isset($a_upload['name']) && !empty($a_upload['name']))
            {
		        if (IsUploadedFile($a_upload))
                    $b_empty = false;
            }
            if ($b_empty && isset($a_upload['error']))
                switch ($a_upload['error'])
                {
                case 1:
                    $s_mesg = GetMessage(MSG_FILE_UPLOAD_ERR1);
                    break;
                case 2:
                    $s_mesg = GetMessage(MSG_FILE_UPLOAD_ERR2);
                    break;
                case 3:
                    $s_mesg = GetMessage(MSG_FILE_UPLOAD_ERR3);
                    break;
                case 4:
                    $s_mesg = GetMessage(MSG_FILE_UPLOAD_ERR4);
                    break;
                default:
                    $s_mesg = GetMessage(MSG_FILE_UPLOAD_ERR_UNK,
                                    array("ERRNO"=>$a_upload['error']));
                    break;
                }
        }
    }
    else
        $b_empty = IsFieldEmpty($a_main_vars[$s_fld]);
    return ($b_empty);
}

	//
	// Return a derived field value or value specification.
	//
function GetDerivedValue($a_form_data,$s_word,&$a_errors)
{
    global  $aFileVars;

	$s_value = "";
		//
		// a field name or a value specification
		// value specifications have the following format:
		//		%spec%
		//
	if (substr($s_word,0,1) == '%')
	{
		if (substr($s_word,-1,1) != '%')
		{
			SendAlert(GetMessage(MSG_INV_VALUE_SPEC,array("SPEC"=>$s_word)));
			$s_value = $s_word;
		}
		else
		{
			$s_spec = substr($s_word,1,-1);
			$s_value = ValueSpec($s_spec,$a_form_data,$a_errors);
		}
	}
	else
	{
		$s_fld_name = $s_word;
            //
            // try form data first, then the environment/server data
            //
		if (IsFieldSet($s_fld_name,$a_form_data))
			$s_value = GetFieldValue($s_fld_name,$a_form_data);
        elseif (($s_value = GetEnvValue($s_fld_name)) === false)
            $s_value = "";
        $s_value = trim($s_value);
	}
	return ($s_value);
}

	//
	// Derive a value from the form data using the specification returned
	// from ParseDerivation.
	//
function DeriveValue($a_form_data,$a_value_spec,$s_name,&$a_errors)
{
	$s_value = "";
	for ($ii = 0 ; $ii < count($a_value_spec) ; $ii++)
	{
		switch ($a_value_spec[$ii])
		{
		case '+':
				//
				// concatenate with a single space between, but skip the space
				// if the next field is empty
				//
			if ($ii < count($a_value_spec)-1)
			{
				$s_temp = GetDerivedValue($a_form_data,$a_value_spec[$ii+1],$a_errors);
				if (!IsFieldEmpty($s_temp))
					$s_value .= ' ';
			}
			break;
		case '.':
				//
				// concatenate with no space between
				//
			break;
		case '*':
				//
				// concatenate with a single space between
				//
			$s_value .= ' ';
			break;
		default:
				//
				// a field name or a value specification
				// value specifications have the following format:
				//		%name%
				//
			$s_value .= GetDerivedValue($a_form_data,$a_value_spec[$ii],$a_errors);
			break;
		}
	}
	return ($s_value);
}

	//
	// Create derived fields specified by the "derive_fields" value.
	//
function CreateDerived($a_form_data)
{
	if (isset($a_form_data["derive_fields"]))
	{
		$a_errors = array();
			//
			// get the list of derived field specifications
			//
		$a_list = TrimArray(explode(",",$a_form_data["derive_fields"]));
		foreach ($a_list as $s_fld_spec)
		{
            if ($s_fld_spec === "")
                    //
                    // silently ignore empty derivations
                    //
                continue;
			if (($i_pos = strpos($s_fld_spec,"=")) === false)
			{
				$a_errors[] = $s_fld_spec;
				continue;
			}
			$s_name = trim(substr($s_fld_spec,0,$i_pos));
			$s_fld_spec = substr($s_fld_spec,$i_pos+1);

			if (($a_value_spec = ParseDerivation($a_form_data,$s_fld_spec,
												$s_name,$a_errors)) === false)
				break;
			$a_form_data[$s_name] = DeriveValue($a_form_data,$a_value_spec,$s_name,$a_errors);
		}
		if (count($a_errors) > 0)
		{
			SendAlert(GetMessage(MSG_DERIVED_INVALID).implode("\n",$a_errors));
			Error("derivation_failure",GetMessage(MSG_INT_FORM_ERROR));
		}
	}
	return ($a_form_data);
}

    //
    // To process the name specification for files and update the
    // array of file variables accordingly.
    //
function SetFileNames($s_name_spec,$a_order,$a_fields,$a_raw_fields,$a_all_raw_values,$a_file_vars)
{
	$a_errors = array();
		//
		// get the list of file name derivations
		//
	$a_list = TrimArray(explode(",",$s_name_spec));
	foreach ($a_list as $s_fld_spec)
	{
        if ($s_fld_spec === "")
                //
                // silently ignore empty file name derivations
                //
            continue;
		if (($i_pos = strpos($s_fld_spec,"=")) === false)
		{
			$a_errors[] = $s_fld_spec;
			continue;
		}
		$s_name = trim(substr($s_fld_spec,0,$i_pos));
		$s_fld_spec = substr($s_fld_spec,$i_pos+1);

		if (($a_value_spec = ParseDerivation($a_raw_fields,$s_fld_spec,
											$s_name,$a_errors)) === false)
			break;
        if (isset($a_file_vars[$s_name]) && is_array($a_file_vars[$s_name]))
        {
                //
                // we create our own special entry in the file variable's data
                //
		    $a_file_vars[$s_name]['new_name'] = DeriveValue($a_raw_fields,
                                                        $a_value_spec,$s_name,
                                                        $a_errors);
                //
                // we also create (derive) a new field called 'name_of_X'
                // where X is the file fields's name
                //
            ProcessField("name_of_$s_name",$a_file_vars[$s_name]['new_name'],
                        $a_order,$a_fields,$a_raw_fields);
            $a_all_raw_values["name_of_$s_name"] = $a_file_vars[$s_name]['new_name'];
        }
        /* This is annoying if a file upload is optional.  Just ignore missing
            file upload fields.
        else
		    SendAlert(GetMessage(MSG_FILE_NAMES_NOT_FILE,
                                            array("NAME"=>$s_name)));*/
	}
	if (count($a_errors) > 0)
	{
		SendAlert(GetMessage(MSG_FILE_NAMES_INVALID).implode("\n",$a_errors));
		Error("file_names_derivation_failure",GetMessage(MSG_INT_FORM_ERROR));
	}
    return (array($a_order,$a_fields,$a_raw_fields,$a_all_raw_values,$a_file_vars));
}

	//
	// Process a list of attributes or options.
	// Format for each attribute/option:
	//		name
	// or
	//		name=value
	//
	// Values can be simple values or semicolon (;) separated lists:
	//			avalue
	//			value1;value2;value3;...
	//
	// Returns attribute/options in the associative array $a_attribs.
	// Optionally, valid attributes can be provided in $a_valid_attribs
	// (if empty, all attributes found are considered valid).
	// Errors are returned in $a_errors.
	//
function ProcessAttributeList($a_list,&$a_attribs,&$a_errors,
						$a_valid_attribs = array())
{
	$b_got_valid_list = (count($a_valid_attribs) > 0);
	foreach ($a_list as $s_attrib)
	{
			//
			// if the name begins with '.' then silently ignore it;
			// this allows you to temporarily disable an option without
			// getting an alert message
			//
		if (($i_pos = strpos($s_attrib,"=")) === false)
		{
			$s_name = trim($s_attrib);
			if (empty($s_name) || $s_name{0} == '.')
				continue;
				//
				// option is a simple "present" value
				//
			$a_attribs[$s_name] = true;
		}
		else
		{
			$s_name = trim(substr($s_attrib,0,$i_pos));
			if (empty($s_name) || $s_name{0} == '.')
				continue;
			$s_value_list = substr($s_attrib,$i_pos+1);
			if (($i_pos = strpos($s_value_list,";")) === false)
					//
					// single value
					//
				$a_attribs[$s_name] = trim($s_value_list);
			else
					//
					// list of values
					//
				$a_attribs[$s_name] = TrimArray(explode(";",$s_value_list));
		}
		if ($b_got_valid_list && !isset($a_valid_attribs[$s_name]))
			$a_errors[] = $s_name;
	}
}

	//
	// Process the options specified in the form.
	// Options can be specified in this format:
	//			option1,option2,option3,...
	// Each option can be a simple word or a word and value:
	//			name
	//			name=value
	// No name or value can contain a comma.
	// Values can be simple values or semicolon (;) separated lists:
	//			avalue
	//			value1;value2;value3;...
	// No value can contain a semicolon.
	// Be careful of values beginning and ending with whitespace characters;
	// they will be trimmed.
	//
function ProcessOptions($s_name,$a_form_data,&$a_options,$a_valid_options)
{
	$a_errors = array();
	$a_options = array();
	if (isset($a_form_data[$s_name]))
	{
			//
			// get the options list and trim each one
			//
		$a_list = TrimArray(explode(",",$a_form_data[$s_name]));
		ProcessAttributeList($a_list,$a_options,$a_errors,$a_valid_options);
	}
	if (count($a_errors) > 0)
		SendAlert(GetMessage(MSG_OPTIONS_INVALID,array("OPT"=>$s_name)).
					implode("\n",$a_errors));
}

	//
	// Process the mail_options specified in the form.
	//
function ProcessMailOptions($a_form_data)
{
	global	$MAIL_OPTS,$VALID_MAIL_OPTIONS;

	ProcessOptions("mail_options",$a_form_data,$MAIL_OPTS,$VALID_MAIL_OPTIONS);
}

	//
	// Check if an option is set
	//
function IsMailOptionSet($s_name)
{
	global	$MAIL_OPTS;

	return (isset($MAIL_OPTS[$s_name]));
}

	//
	// Return an option's value or NULL if not set.
	//
function GetMailOption($s_name)
{
	global	$MAIL_OPTS;

	return (isset($MAIL_OPTS[$s_name]) ? $MAIL_OPTS[$s_name] : NULL);
}

	//
	// Process the crm_options specified in the form.
	//
function ProcessCRMOptions($a_form_data)
{
	global	$CRM_OPTS,$VALID_CRM_OPTIONS;

	ProcessOptions("crm_options",$a_form_data,$CRM_OPTS,$VALID_CRM_OPTIONS);
}

	//
	// Check if an option is set
	//
function IsCRMOptionSet($s_name)
{
	global	$CRM_OPTS;

	return (isset($CRM_OPTS[$s_name]));
}

	//
	// Return an option's value or NULL if not set.
	//
function GetCRMOption($s_name)
{
	global	$CRM_OPTS;

	return (isset($CRM_OPTS[$s_name]) ? $CRM_OPTS[$s_name] : NULL);
}

	//
	// Check if a field is in the mail exclusion list.
	//
function IsMailExcluded($s_name)
{
	$a_list = GetMailOption("Exclude");
	if (!isset($a_list))
		return (false);
	if (is_array($a_list))
		return (in_array($s_name,$a_list));
	else
		return ($s_name === $a_list);
}

	//
	// Process the autorespond specified in the form.
	//
function ProcessAROptions($a_form_data)
{
	global	$AR_OPTS,$VALID_AR_OPTIONS;

	ProcessOptions("autorespond",$a_form_data,$AR_OPTS,$VALID_AR_OPTIONS);
}

	//
	// Check if an option is set
	//
function IsAROptionSet($s_name)
{
	global	$AR_OPTS;

	return (isset($AR_OPTS[$s_name]));
}

	//
	// Return an option's value or NULL if not set.
	//
function GetAROption($s_name)
{
	global	$AR_OPTS;

	return (isset($AR_OPTS[$s_name]) ? $AR_OPTS[$s_name] : NULL);
}

	//
	// Process the mail_options specified in the form.
	//
function ProcessFilterOptions($a_form_data)
{
	global	$FILTER_OPTS,$VALID_FILTER_OPTIONS;

	ProcessOptions("filter_options",$a_form_data,$FILTER_OPTS,$VALID_FILTER_OPTIONS);
}

	//
	// Check if an option is set
	//
function IsFilterOptionSet($s_name)
{
	global	$FILTER_OPTS;

	return (isset($FILTER_OPTS[$s_name]));
}

	//
	// Return an option's value or NULL if not set.
	//
function GetFilterOption($s_name)
{
	global	$FILTER_OPTS;

	return (isset($FILTER_OPTS[$s_name]) ? $FILTER_OPTS[$s_name] : NULL);
}

	//
	// Lookup a filter attribute for the given filter.
	// Return it's value or false if not set.
	//
function GetFilterAttrib($s_filter,$s_attrib)
{
	global	$FILTER_ATTRIBS,$FILTER_ATTRIBS_LOOKUP;

	if (!isset($FILTER_ATTRIBS[$s_filter]))
			//
			// no attributes for the filter
			//
		return (false);
	if (!isset($FILTER_ATTRIBS_LOOKUP[$s_filter]))
	{
			//
			// the attributes have not yet been parsed - create the lookup table
			//
		$a_list = TrimArray(explode(",",$FILTER_ATTRIBS[$s_filter]));
		$FILTER_ATTRIBS_LOOKUP[$s_filter] = array();
		$a_errors = array();

		ProcessAttributeList($a_list,$FILTER_ATTRIBS_LOOKUP[$s_filter],$a_errors);
	}
		//
		// perform the lookup and return the value
		//
	if (!isset($FILTER_ATTRIBS_LOOKUP[$s_filter][$s_attrib]))
		return (false);
	return ($FILTER_ATTRIBS_LOOKUP[$s_filter][$s_attrib]);
}

	//
	// Check the filter attributes for the given filter.
	// Return true if the given attribute is set otherwise false.
	//
function IsFilterAttribSet($s_filter,$s_attrib)
{
	return (GetFilterAttrib($s_filter,$s_attrib));
}

    //
    // Process the given .ini file.
    //
function ProcessFormIniFile($s_file)
{
    global  $EMAIL_ADDRS;

    $a_sections = parse_ini_file($s_file,TRUE);
    if (DB_SEE_INI)
    {
            //
            // just display the ini file
            //
        $s_text = "<p><b>The following settings were found in the file '$s_file':</b></p>";
        foreach ($a_sections as $s_sect=>$a_settings)
        {
            $s_text .= "<p>[$s_sect]\n";
            foreach ($a_settings as $s_name=>$s_value)
                $s_text .= "$s_name = \"$s_value\"\n";
            $s_text .= "</p>";
        }
        CreatePage($s_text);
        exit;
    }
        //
        // Load the email_addresses section.
        //
    if (isset($a_sections["email_addresses"]))
        $EMAIL_ADDRS = $a_sections["email_addresses"];
        //
        // Process special fields
        //
    if (isset($a_sections["special_fields"]))
    {
        foreach ($a_sections["special_fields"] as $s_name=>$m_value)
        {
	        if (IsSpecialField($s_name))
                SetSpecialField($s_name,$m_value);
		        //
		        // check for multiple valued special fields
		        //
            if (($a_multi_fld = IsSpecialMultiField($s_name)) !== false)
                SetSpecialMultiField($a_multi_fld[0],$a_multi_fld[1],$m_value);
        }
    }
}

	//
	// UnMangle an email address
	//
function UnMangle($email)
{
    global  $EMAIL_ADDRS;

        //
        // map from a name to the real email address
        //
    if (isset($EMAIL_ADDRS[$email]))
        $email = $EMAIL_ADDRS[$email];
        //
        // unmangle
        //
	if (AT_MANGLE != "")
		$email = str_replace(AT_MANGLE,"@",$email);
	return ($email);
}

    //
    // Check a list of email addresses (comma separated); returns a list
    // of valid email addresses (comma separated).
    // The return value is true if there is at least one valid email address.
    //
function CheckEmailAddress($s_addr,&$s_valid,&$s_invalid)
{
    global  $TARGET_EMAIL;

    $s_invalid = $s_valid = "";
    $a_list = TrimArray(explode(",",$s_addr));
	$a_invalid = array();
    for ($ii = 0 ; $ii < count($a_list) ; $ii++)
    {
		$s_email = UnMangle($a_list[$ii]);
            //
            // UnMangle works with INI files too, and a single
            // word can expand to a list of email addresses.
            //
        $a_this_list = TrimArray(explode(",",$s_email));
        foreach ($a_this_list as $s_email)
        {
		    $b_is_valid = false;
            for ($jj = 0 ; $jj < count($TARGET_EMAIL) ; $jj++)
                if (eregi($TARGET_EMAIL[$jj],$s_email))
                {
                    if (empty($s_valid))
                	    $s_valid = $s_email;
                    else
                        $s_valid .= ",".$s_email;
				    $b_is_valid = true;
				    break;
                }
		    if (!$b_is_valid)
			    $a_invalid[] = $s_email;
        }
    }
	if (count($a_invalid) > 0)
		$s_invalid = implode(",",$a_invalid);
    return (!empty($s_valid));
}

    //
    // Redirect to another URL
    //
function Redirect($url)
{
		//
		// for browsers without cookies enabled, append the Session ID
		//
    if (defined("SID"))
	    $url = AddURLParams($url,SID);

        //
        // this is probably a good idea to ensure the session data
        // is written away
        //
    if (function_exists('session_write_close'))
        session_write_close();

    header("Location: $url");
		//
		// if the header doesn't work, try JavaScript.
		// if that doesn't work, provide a manual link
		//
	$s_text = GetMessage(MSG_PLSWAIT_REDIR)."\n\n";
	$s_text .= "<script language=\"JavaScript\" type=\"text/javascript\">";
	$s_text .= "window.location.href = '$url';";
	$s_text .= "</script>";
	$s_text .= "\n\n".GetMessage(MSG_IFNOT_REDIR,array("URL"=>$url));
	CreatePage($s_text);
    exit;
}

	//
	// JoinLines is just like "implode" except that it checks
	// the end of each array for the separator already being
	// there. This allows us to join a mixture of mail
	// header lines (already terminated) with body lines.
	// This logic works if HEAD_CRLF, for example, is the same
	// as BODY_LF (i.e. both "\r\n") or if BODY_LF is the
	// same as the last character in HEAD_CRLF (i.e.
	// HEAD_CRLF = "\r\n" and BODY_LF = "\n").
	// Other value combinations may break things.
	//
function JoinLines($s_sep,$a_lines)
{
	$s_str = "";
	if (($i_sep_len = strlen($s_sep)) == 0)
			//
			// no separator
			//
		return (implode("",$a_lines));
	$n_lines = count($a_lines);
	for ($ii = 0 ; $ii < $n_lines ; $ii++)
	{
		$s_line = $a_lines[$ii];
		if (substr($s_line,-$i_sep_len) == $s_sep)
			$s_str .= $s_line;
		else
		{
			$s_str .= $s_line;
				//
				// don't append a separator to the last line
				//
			if ($ii < $n_lines-1)
				$s_str .= $s_sep;
		}
	}
	return ($s_str);
}

	//
	// Expands an array of mail headers into mail header lines.
	//
function ExpandMailHeaders($a_headers)
{
	$s_hdrs = "";
	foreach ($a_headers as $s_name=>$s_value)
		if ($s_name != "")
		{
			if ($s_hdrs != "")
				$s_hdrs .= HEAD_CRLF;
			$s_hdrs .= $s_name.": ".$s_value;
		}
	return ($s_hdrs);
}

	//
	// Expands an array of mail headers into an array containing header lines.
	//
function ExpandMailHeadersArray($a_headers)
{
	$a_hdrs = array();
	foreach ($a_headers as $s_name=>$s_value)
		if ($s_name != "")
			$a_hdrs[] = $s_name.": ".$s_value.HEAD_CRLF;
	return ($a_hdrs);
}

	//
	// Low-level email send function; either calls PHP's mail function
	// or uses the PEAR Mail object.
	// NOTE: for some errors, there's no point trying to email
	// an alert message!  So, in these cases, we just display the error to
	// the user.
	//
function DoMail($s_to,$s_subject,$s_mesg,$a_headers)
{
	global	$PEAR_SMTP_HOST,$PEAR_SMTP_PORT,$PEAR_SMTP_USER,$PEAR_SMTP_PWD;

	if (isset($PEAR_SMTP_HOST) && !empty($PEAR_SMTP_HOST))
	{
		require_once("Mail.php");

		$a_params = array(	"host"=>$PEAR_SMTP_HOST,
							"port"=>$PEAR_SMTP_PORT);
		if (isset($PEAR_SMTP_USER) && !empty($PEAR_SMTP_USER))
		{
			$a_params["auth"] = TRUE;
			$a_params["username"] = $PEAR_SMTP_USER;
			$a_params["password"] = $PEAR_SMTP_PWD;
		}
		$mailer = Mail::factory("smtp",$a_params);
		if (!is_object($mailer))
		{
			ShowError("pear_error",GetMessage(MSG_PEAR_OBJ),FALSE,FALSE);
			exit;
		}
		if (get_class($mailer) === 'pear_error')
		{
			ShowError("pear_error",$mailer->getMessage(),FALSE,FALSE);
			exit;
		}
		if (!isset($a_headers['To']) && !isset($a_headers['to']))
			$a_headers['To'] = $s_to;
		if (!isset($a_headers['Subject']) && !isset($a_headers['subject']))
			$a_headers['Subject'] = $s_subject;
		$res = $mailer->send($s_to,$a_headers,$s_mesg);
		if ($res === TRUE)
			return (TRUE);

		global	$aAlertInfo;

		$aAlertInfo[] = GetMessage(MSG_PEAR_ERROR,array("MSG"=>$res->getMessage()));
		return (FALSE);
	}
	return (mail($s_to,$s_subject,$s_mesg,ExpandMailHeaders($a_headers)));
}

    //
    // Send an email
    //
function SendCheckedMail($to,$subject,$mesg,$sender,$a_headers = array())
{
	global	$PEAR_SMTP_HOST;

	$b_f_option = false;
	$b_form_option = IsMailOptionSet("SendMailFOption");	// this is superseded, but still supported
	if (SENDMAIL_F_OPTION || $b_form_option)
	{
		if (empty($sender))
		{
				//
				// SENDMAIL_F_OPTION with no sender is silently ignored
				//
			if ($b_form_option)
			{
					//
					// form has specified SendMailFOption, but there's no
					// sender address
					//
				static	$b_in_here = false;
				global	$SERVER;

				if (!$b_in_here)		// prevent infinite recursion
				{
					$b_in_here = true;
					SendAlert(GetMessage(MSG_NO_FOPT_ADDR));
					$b_in_here = false;
				}
					//
					// if there's no from address, create a dummy one
					//
				$sender = "dummy@".(isset($SERVER) ? $SERVER : "UnknownServer");
				$a_headers['From'] = $sender;
				$b_f_option = true;
			}
		}
		else
			$b_f_option = true;
	}
	if (INI_SET_FROM && !empty($sender))
		ini_set('sendmail_from',$sender);

	if ((!isset($PEAR_SMTP_HOST) || empty($PEAR_SMTP_HOST)) && $b_f_option)
		return (mail($to,$subject,$mesg,ExpandMailHeaders($a_headers),"-f$sender"));
	else
		return (DoMail($to,$subject,$mesg,$a_headers));
}

    //
    // Send an alert email
    //
function SendAlert($s_error,$b_filter = true,$b_non_error = false)
{
    global  $SPECIAL_VALUES,$FORMATTED_INPUT,$FROM_USER,$aServerVars,$aStrippedFormVars;
	global	$aAlertInfo;

	$s_error = str_replace("\n",BODY_LF,$s_error);
	$b_got_filter = (isset($SPECIAL_VALUES["filter"]) && !empty($SPECIAL_VALUES["filter"]));

		//
		// if there is a filter specified and we're not sending the alert
		// through the filter, don't show the user's data.  This is
		// on the assumption that the filter is an encryption program; so,
		// we don't want to send the user's data in clear text inside the
		// alerts.
		//
	$b_show_data = true;
	if ($b_got_filter && !$b_filter)
		$b_show_data = false;

	$s_form_subject = $s_alert_to = "";
	$b_check = true;
		//
		// might be too early to have $SPECIAL_VALUES set, so
		// look in the form vars too
		//
	if (isset($SPECIAL_VALUES["alert_to"]))
    	$s_alert_to = trim($SPECIAL_VALUES["alert_to"]);
    if (empty($s_alert_to) && isset($aStrippedFormVars["alert_to"]))
		$s_alert_to = trim($aStrippedFormVars["alert_to"]);

	if (isset($SPECIAL_VALUES["subject"]))
    	$s_form_subject = trim($SPECIAL_VALUES["subject"]);
    if (empty($s_form_subject) && isset($aStrippedFormVars["subject"]))
		$s_form_subject = trim($aStrippedFormVars["subject"]);

    if (empty($s_alert_to))
	{
        $s_alert_to = DEF_ALERT;
		$b_check = false;
	}
    if (!empty($s_alert_to))
    {
		$s_from_addr = $s_from = "";
		$a_headers = array();
		if (isset($FROM_USER) && !empty($FROM_USER))
		{
			if ($FROM_USER != "NONE")
			{
				$a_headers['From'] = $FROM_USER;
				$s_from = "From: $FROM_USER";
				$s_from_addr = $FROM_USER;
			}
		}
		else
		{
			global	$SERVER;

			$s_from_addr = "FormMail@".$SERVER;
			$a_headers['From'] = $s_from_addr;
			$s_from = "From: $s_from_addr";
		}
		$s_mesg = "To: ".UnMangle($s_alert_to).BODY_LF;
		if (!empty($s_from))
			$s_mesg .= $s_from.BODY_LF;
		$s_mesg .= BODY_LF;
		if (count($aAlertInfo) > 0)
		{
			if ($b_show_data)
			{
				$s_error .= BODY_LF.GetMessage(MSG_MORE_INFO).BODY_LF;
				$s_error .= implode(BODY_LF,$aAlertInfo);
			}
			else
				$s_error .= BODY_LF.GetMessage(MSG_INFO_STOPPED).BODY_LF;
		}
		if ($b_non_error)
		{
        	$s_mesg .= $s_error.BODY_LF.BODY_LF;
			$s_subj = GetMessage(MSG_FM_ALERT);
			if (!empty($s_form_subject))
				$s_subj .= " ($s_form_subject)";
		}
		else
		{
        	$s_mesg .= GetMessage(MSG_FM_ERROR_LINE).BODY_LF.
							$s_error.BODY_LF.BODY_LF;
			$s_subj = GetMessage(MSG_FM_ERROR);
			if (!empty($s_form_subject))
				$s_subj .= " ($s_form_subject)";
			if ($b_show_data)
				$s_mesg .= implode(BODY_LF,$FORMATTED_INPUT);
			else
				$s_mesg .= GetMessage(MSG_USERDATA_STOPPED);
		}
		if ($b_filter && $b_got_filter)
			$s_mesg = GetMessage(MSG_FILTERED,
							array("FILTER"=>$SPECIAL_VALUES["filter"])).
							BODY_LF.BODY_LF.
							Filter($SPECIAL_VALUES["filter"],$s_mesg);
        if (isset($aServerVars['HTTP_REFERER']))
            $s_mesg .= BODY_LF.BODY_LF."Referring page was ".$aServerVars['HTTP_REFERER'];
        elseif (isset($SPECIAL_VALUES['this_form']) && $SPECIAL_VALUES['this_form'] !== "")
            $s_mesg .= BODY_LF.BODY_LF."Referring form was ".$SPECIAL_VALUES['this_form'];

        if (isset($aServerVars['REMOTE_ADDR']))
            $s_mesg .= BODY_LF.BODY_LF."User IP address was ".$aServerVars['REMOTE_ADDR'];

		if ($b_check)
		{
			if (CheckEmailAddress($s_alert_to,$s_valid,$s_invalid))
				return (SendCheckedMail($s_valid,$s_subj,$s_mesg,$s_from_addr,$a_headers));
		}
		else
			return (SendCheckedMail($s_alert_to,$s_subj,$s_mesg,$s_from_addr,$a_headers));
    }
	return (false);
}

	//
	// Read the lines in a file and return an array.
	// Each line is stripped of line termination characters.
	//
function ReadLines($fp)
{
	$a_lines = array();
	while (!feof($fp))
	{
		$s_line = fgets($fp,4096);
			//
			// strip carriage returns and line feeds
			//
		$s_line = str_replace("\r","",$s_line);
		$s_line = str_replace("\n","",$s_line);
		$a_lines[] = $s_line;
	}
	return ($a_lines);
}

    //
    // Open a URL and return the data from it as a string.
    // Returns false on failure ($s_error has the error string)
    //
function GetURL($s_url,&$s_error)
{
    global  $php_errormsg,$aServerVars,$FM_VERS;
    global  $AUTHENTICATE,$AUTH_USER,$AUTH_PW;

        //
        // parse the URL to get the component parts
        //
    $a_parts = parse_url($s_url);
        //
        // must have a host
        //
    if (!isset($a_parts["host"]))
    {
        $s_error = GetMessage(MSG_URL_PARSE);
        return (false);
    }
    $s_host_hdr = $a_parts["host"];
        //
        // if no port number is given, we support http and https
        //
    if (!isset($a_parts["port"]))
    {
        if (!isset($a_parts["scheme"]) || strtolower($a_parts["scheme"]) == "http")
            $a_parts["port"] = 80;
        elseif (strtolower($a_parts["scheme"]) == "https")
            $a_parts["port"] = 443;
        else
        {
           $s_error = GetMessage(MSG_URL_SCHEME,
                                    array("SCHEME"=>$a_parts["scheme"]));
           return (false);
        }
    }
    if ($a_parts["port"] == 443)
            //
            // fsockopen requires ssl:// in the host name
            //
        $a_parts["host"] = "ssl://".$a_parts["host"];

        //
        // default the path if empty
        //
    if (!isset($a_parts["path"]) || $a_parts["path"] === "")
        $a_parts["path"] = "/";

    $f_sock = @fsockopen($a_parts["host"],(int) $a_parts["port"],$i_errno,$s_errstr,30);
    if ($f_sock === false)
    {
        $s_error = GetMessage(MSG_SOCKET,
                            array("ERRNO"=>$i_errno,
                                "ERRSTR"=>$s_errstr,
                                "PHPERR"=>isset($php_errormsg) ? $php_errormsg : ""));
        return (false);
    }

        //
        // the GET request
        //
	fputs($f_sock,"GET ".$a_parts["path"]." HTTP/1.0\r\n");

        //
        // Determine authentication requirements
        //
    if ($AUTHENTICATE !== "" || $AUTH_USER !== "" || $AUTH_PW !== "")
    {
        if ($AUTHENTICATE === "")
		    fputs($f_sock,"Authorization: Basic ".
					    base64_encode("$AUTH_USER:$AUTH_PW")."\r\n");
        else
		    fputs($f_sock,"Authorization: $AUTHENTICATE\r\n");

    }
    else
    {
        if (isset($a_parts["user"]) || isset($a_parts["pass"]))
        {
	        $s_auth_user = isset($a_parts["user"]) ? $a_parts["user"] : "";
	        $s_auth_pass = isset($a_parts["pass"]) ? $a_parts["pass"] : "";
        }
        else
        {
	        $s_auth_type = isset($aServerVars["PHP_AUTH_TYPE"]) ? $aServerVars["PHP_AUTH_TYPE"] : "";
	        $s_auth_user = isset($aServerVars["PHP_AUTH_USER"]) ? $aServerVars["PHP_AUTH_USER"] : "";
	        $s_auth_pass = isset($aServerVars["PHP_AUTH_PW"]) ? $aServerVars["PHP_AUTH_PW"] : "";
        }
        if (!isset($s_auth_type) || $s_auth_type === "")
            $s_auth_type = "Basic";
            //
            // Add the authentication header
            //
	    if ($s_auth_user !== "" || $s_auth_pass !== "")
		    fputs($f_sock,"Authorization: $s_auth_type ".
					    base64_encode("$s_auth_user:$s_auth_pass")."\r\n");
    }

        //
        // Specify the host name
        //
	fputs($f_sock,"Host: $s_host_hdr\r\n");
        //
        // Specify the user agent
        //
	fputs($f_sock,"User-Agent: FormMail/$FM_VERS (from www.tectite.com)\r\n");
        //
        // Accept any output
        //
	fputs($f_sock,"Accept: */*\r\n");
        //
        // End of request headers
        //
	fputs($f_sock,"\r\n");

		//
		// Read and parse the response header
		//
	$i_http_code = 0;
    $s_status = "";
	while (!feof($f_sock))
	{
		$s_line = fgets($f_sock,4096);
		if ($s_line == "\r\n" || $s_line == "\n")
			break;
		if (substr($s_line,0,4) == "HTTP")
		{
			$i_pos = strpos($s_line," ");
			$s_status = substr($s_line,$i_pos+1);
			$i_end_pos = strpos($s_status," ");
			if ($i_end_pos === false)
				$i_end_pos = strlen($s_status);
			$i_http_code = (int) substr($s_status,0,$i_end_pos);
		}
	}
	if ($i_http_code < 200 || $i_http_code > 299)
    {
        $s_error = GetMessage(MSG_GETURL_OPEN,array("STATUS"=>$s_status));
        fclose($f_sock);
        return (false);
    }
        //
        // read content into one big string buffer and return
        //
	$s_buf = "";
	while (!feof($f_sock))
		$s_buf .= fread($f_sock,1024);
	fclose($f_sock);
    return ($s_buf);
}

	//
	// Load a template file into a string.
	//
function LoadTemplate($s_name,$s_dir,$s_url,$b_ret_lines = false)
{
	global	$php_errormsg;

	$s_buf = "";
	$a_lines = array();
	if (!empty($s_dir))
	{
		$s_name = "$s_dir/".basename($s_name);
@		$fp = fopen($s_name,"r");
		if ($fp === false)
		{
			SendAlert(GetMessage(MSG_OPEN_TEMPLATE,array("NAME"=>$s_name,
													"ERROR"=>CheckString($php_errormsg))));
			return (false);
		}
		if ($b_ret_lines)
			$a_lines = ReadLines($fp);
		else
				//
				// load the whole template into a string
				//
			$s_buf = fread($fp,filesize($s_name));
		fclose($fp);
	}
	else
	{
		global	$aServerVars;

		$s_name = "$s_url/".basename($s_name);
		if (isset($aServerVars['HTTP_USER_AGENT']))
			$s_name = AddURLParams($s_name,"USER_AGENT=".$aServerVars['HTTP_USER_AGENT']);

@		$fp = fopen($s_name,"r");
		if ($fp === false)
		{
			SendAlert(GetMessage(MSG_OPEN_TEMPLATE,array("NAME"=>$s_name,
													"ERROR"=>CheckString($php_errormsg))));
			return (false);
		}
		if ($b_ret_lines)
			$a_lines = ReadLines($fp);
		else
				//
				// load the whole template into a string
				//
			while (!feof($fp))
				$s_buf .= fread($fp,4096);
		fclose($fp);
	}
	return ($b_ret_lines ? $a_lines : $s_buf);
}

	//
	// To show an error template.  The template must be HTML and, for security
	// reasons, must be a file on the server in the directory specified
	// by $TEMPLATEDIR or $TEMPLATEURL.
	// $a_specs is an array of substitutions to perform, as follows:
	//		tag-name	replacement string
	//
	// For example:
	//		"fmerror"=>"An error message"
	//
function ShowErrorTemplate($s_name,$a_specs,$b_user_error)
{
    global	$TEMPLATEURL,$TEMPLATEDIR;

	if (empty($TEMPLATEDIR) && empty($TEMPLATEURL))
	{
		SendAlert(GetMessage(MSG_TEMPLATES));
		return (false);
	}
	if (($s_buf = LoadTemplate($s_name,$TEMPLATEDIR,$TEMPLATEURL)) === false)
		return (false);

		//
		// now look for the tags to replace
		//
	foreach ($a_specs as $s_tag=>$s_value)
			//
			// search for
			//		<tagname/>
			// with optional whitespace
			//
		$s_buf = preg_replace('/<\s*'.preg_quote($s_tag,"/").'\s*\/\s*>/ims',
							nl2br($s_value),$s_buf);
    if ($b_user_error)
    {
			// strip any <fmusererror> and </fmusererror> tags
			//
			// You can show information that's specific to user
			// errors between these special tags.
			//
		$s_buf = preg_replace('/<\s*\/?\s*fmusererror\s*>/ims','',$s_buf);
			//
			// since this isn't a system error, strip anything between
			// <fmsyserror> and </fmsyserror>
			//
		$s_buf = preg_replace('/<\s*fmsyserror\s*>.*<\s*\/\s*fmsyserror\s*>/ims','',$s_buf);
	}
	else
    {
			// strip any <fmsyserror> and </fmsyserror> tags
			//
			// You can show information that's specific to system
			// errors between these special tags.
			//
		$s_buf = preg_replace('/<\s*\/?\s*fmsyserror\s*>/ims','',$s_buf);
			//
			// since this isn't a user error, strip anything between
			// <fmusererror> and </fmusererror>
			//
		$s_buf = preg_replace('/<\s*fmusererror\s*>.*<\s*\/\s*fmusererror\s*>/ims','',$s_buf);
    }
		//
		// just output the page
		//
	echo $s_buf;
	return (true);
}

	//
	// To show an error to the user.
	//
function ShowError($error_code,$error_mesg,$b_user_error,
				$b_alerted = false,$a_item_list = array(),$s_extra_info = "")
{
    global  $SPECIAL_FIELDS,$SPECIAL_MULTI,$SPECIAL_VALUES;
    global  $aServerVars,$aSessionVars,$aStrippedFormVars;

		//
		// Testing with PHP 4.0.6 indicates that sessions don't always work.
		// So, we'll also add the error to the URL, unless
		// PUT_DATA_IN_URL is false.
		//
	$aSessionVars["FormError"] = $error_mesg;
	$aSessionVars["FormErrorInfo"] = $s_extra_info;
	$aSessionVars["FormErrorCode"] = $error_code;
	$aSessionVars["FormErrorItems"] = $a_item_list;
	$aSessionVars["FormIsUserError"] = $b_user_error;
	$aSessionVars["FormAlerted"] = $b_alerted;
	$aSessionVars["FormData"] = array();

    $bad_url = $SPECIAL_VALUES["bad_url"];
    $bad_template = $SPECIAL_VALUES["bad_template"];
    $this_form = $SPECIAL_VALUES["this_form"];
    if (!empty($bad_url))
	{
		$a_params = array();
		$a_params[] = "this_form=".urlencode("$this_form");
		$a_params[] = "bad_template=".urlencode("$bad_template");
		if (PUT_DATA_IN_URL)
		{
			$a_params[] = "error=".urlencode("$error_mesg");
			$a_params[] = "extra=".urlencode("$s_extra_info");
			$a_params[] = "errcode=".urlencode("$error_code");
			$a_params[] = "isusererror=".($b_user_error ? "1" : "0");
			$a_params[] = "alerted=".($b_alerted ? "1" : "0");
			$i_count = 1;
			foreach ($a_item_list as $s_item)
			{
				$a_params[] = "erroritem$i_count=".urlencode("$s_item");
				$i_count++;
			}
		}
		else
				//
				// tell the bad_url to look in the session only
				//
			$a_params[] = "insession=1";
			//
			// Add the posted data to the URL so that an intelligent
			// $bad_url can call the form again
			//
		foreach ($aStrippedFormVars as $s_name=>$m_value)
		{
				//
				// skip special fields
				//
			$b_special = false;
			if (in_array($s_name,$SPECIAL_FIELDS))
				$b_special = true;
			else
			{
				foreach ($SPECIAL_MULTI as $s_multi_fld)
				{
					$i_len = strlen($s_multi_fld);
					if (substr($s_name,0,$i_len) == $s_multi_fld)
					{
						$i_index = (int) substr($s_name,$i_len);
						if ($i_index > 0)
						{
							$b_special = true;
							break;
						}
					}
				}
			}
			if (!$b_special)
			{
				if (PUT_DATA_IN_URL)
				{
					if (is_array($m_value))
						foreach ($m_value as $s_value)
							$a_params[] = "$s_name".'[]='.
										urlencode(substr($s_value,0,MAXSTRING));
					else
						$a_params[] = "$s_name=".urlencode(substr($m_value,0,MAXSTRING));
				}
				else
				{
					if (is_array($m_value))
						$aSessionVars["FormData"]["$s_name"] = $m_value;
					else
						$aSessionVars["FormData"]["$s_name"] = substr($m_value,0,MAXSTRING);
				}
			}
		}
            //
            // Now add the authentication data, if any
            //
        if ((isset($aServerVars["PHP_AUTH_USER"]) &&
                $aServerVars["PHP_AUTH_USER"] !== "") ||
            (isset($aServerVars["PHP_AUTH_PW"]) &&
                $aServerVars["PHP_AUTH_PW"] !== ""))
        {
		    if (PUT_DATA_IN_URL)
            {
                if (isset($aServerVars["PHP_AUTH_USER"]))
                    $a_params[] = "PHP_AUTH_USER=".urlencode($aServerVars["PHP_AUTH_USER"]);

                if (isset($aServerVars["PHP_AUTH_PW"]))
                    $a_params[] = "PHP_AUTH_PW=".urlencode($aServerVars["PHP_AUTH_PW"]);

                if (isset($aServerVars["PHP_AUTH_TYPE"]))
                    $a_params[] = "PHP_AUTH_TYPE=".urlencode($aServerVars["PHP_AUTH_TYPE"]);
            }
            else
            {
                if (isset($aServerVars["PHP_AUTH_USER"]))
                    $aSessionVars["FormData"]["PHP_AUTH_USER"] = $aServerVars["PHP_AUTH_USER"];

                if (isset($aServerVars["PHP_AUTH_PW"]))
                    $aSessionVars["FormData"]["PHP_AUTH_PW"] = $aServerVars["PHP_AUTH_PW"];

                if (isset($aServerVars["PHP_AUTH_TYPE"]))
                    $aSessionVars["FormData"]["PHP_AUTH_TYPE"] = $aServerVars["PHP_AUTH_TYPE"];
            }
        }
		$bad_url = AddURLParams($bad_url,$a_params,false);
        Redirect($bad_url);
	}
	else
    {
		if (!empty($bad_template))
		{
			$a_specs = array("fmerror"=>htmlspecialchars("$error_mesg"),
							"fmerrorcode"=>htmlspecialchars("$error_code"),
							"fmfullerror"=>htmlspecialchars("$error_mesg")."\n".
											htmlspecialchars("$s_extra_info"),
							"fmerrorextra"=>htmlspecialchars("$s_extra_info"),);
			$i_count = 1;
			foreach ($a_item_list as $s_item)
			{
				$a_specs["fmerroritem$i_count"] = htmlspecialchars($s_item);
				$i_count++;
			}
			$s_list = "";
			foreach ($a_item_list as $s_item)
				$s_list .= "<li>".htmlspecialchars($s_item)."</li>\n";
			$a_specs["fmerroritemlist"] = $s_list;
			if (ShowErrorTemplate($bad_template,$a_specs,$b_user_error))
				return;
		}
        $s_text = GetMessage(MSG_ERROR_PROC);
		if ($b_user_error)
			$s_text .= $error_mesg."\n".$s_extra_info;
		else
		{
			if ($b_alerted)
				$s_text .= GetMessage(MSG_ALERT_DONE);
			else
				$s_text .= GetMessage(MSG_PLS_CONTACT);
			$s_text .= GetMessage(MSG_APOLOGY);
		}
        CreatePage($s_text);
			//
			// the session data is not needed now
			//
		ZapSession();
    }
}

    //
    // Report an error
    //
function Error($error_code,$error_mesg,$b_filter = true,$show = true,$int_mesg = "")
{
	$b_alerted = false;
	if (SendAlert("$error_code\n *****$int_mesg*****\nError=$error_mesg\n",$b_filter))
		$b_alerted = true;
    if ($show)
		ShowError($error_code,$error_mesg,false,$b_alerted);
	else
			//
			// show something to the user
			//
		ShowError($error_code,GetMessage(MSG_SUBM_FAILED),false,$b_alerted);
    exit;
}

    //
    // Report a user error
    //
function UserError($s_error_code,$s_error_mesg,
					$s_extra_info = "",$a_item_list = array())
{
	$b_alerted = false;
	if (ALERT_ON_USER_ERROR &&
			SendAlert("$s_error_code\nError=$s_error_mesg\n$s_extra_info\n"))
		$b_alerted = true;
	ShowError($s_error_code,$s_error_mesg,true,$b_alerted,$a_item_list,$s_extra_info);
    exit;
}

	//
	// Create a simple page with the given text.
    //
function CreatePage($text)
{
	global	$FM_VERS;

	echo "<html>";
	echo "<head>";
	echo "</head>";
	echo "<body>";
	echo nl2br($text);
	echo "<p /><p><small>";
	echo GetMessage(MSG_ABOUT_FORMMAIL,array("FM_VERS"=>$FM_VERS,
											"TECTITE"=>"www.tectite.com"));
	echo "</small></p>";
	echo "</body>";
	echo "</html>";
}

	//
	// Strip slashes if magic_quotes_gpc is set.
	//
function StripGPC($s_value)
{
	if (get_magic_quotes_gpc() != 0)
		$s_value = stripslashes($s_value);
	return ($s_value);
}

	//
	// return an array, stripped of slashes if magic_quotes_gpc is set
	//
function StripGPCArray($a_values)
{
	if (get_magic_quotes_gpc() != 0)
		foreach ($a_values as $m_key=>$m_value)
			if (is_array($m_value))
					//
					// strip arrays recursively
					//
				$a_values[$m_key] = StripGPCArray($m_value);
			else
					//
					// convert scalar to string and strip
					//
				$a_values[$m_key] = stripslashes("$m_value");
	return ($a_values);
}

	//
	// Strip a value of unwanted characters, which might be hacks.
	// If $b_conv_quotes is true, also swaps all double quotes with single quotes.
	//
function Strip($value,$b_conv_quotes = true)
{
	if ($b_conv_quotes)
			//
			// "standard" quote conversion
			//
		$value = str_replace("\"","'",$value);
	$value = preg_replace('/[[:cntrl:][:space:]]+/'," ",$value);	// zap all control chars and multiple blanks
	return ($value);
}

	//
	// Clean a value.  This means:
	//	1. convert to string
	//	2. truncate to maximum length
	//	3. strip the value of unwanted or dangerous characters (hacks)
	//	4. trim both ends of whitespace
	// Each element of an array is cleaned as above.  This process occurs
	// recursively, so arrays of arrays work OK too (though there's no
	// need for that in this program).
	//
	// Non-scalar values are changed to the string "<X>" where X is the type.
	// In general, FormMail won't receive non-scalar non-array values, so this
	// is more a future-proofing measure.
	//
function CleanValue($m_value,$b_conv_quotes = true)
{
	if (is_array($m_value))
	{
		foreach ($m_value as $m_key=>$m_item)
			$m_value[$m_key] = CleanValue($m_item,$b_conv_quotes);
	}
	elseif (!is_scalar($m_value))
		$m_value = "<".gettype($m_value).">";
	else
	{
			//
			// convert to string and truncate
			//
		$m_value = substr("$m_value",0,MAXSTRING);
			//
			// strip unwanted chars and trim
			//
		$m_value = trim(Strip($m_value,$b_conv_quotes));
	}
	return ($m_value);
}

	//
	// Clean a special value.  Special values listed in $SPECIAL_NOSTRIP
	// will not be cleaned.
	//
function SpecialCleanValue($s_name,$m_value)
{
	global	$SPECIAL_NOSTRIP;

	if (!in_array($s_name,$SPECIAL_NOSTRIP))
		$m_value = CleanValue($m_value);
	return ($m_value);
}

	//
	// Return the fields and their values in a string containing one
	// field per line.
	//
function MakeFieldOutput($a_order,$a_fields,$s_line_feed = BODY_LF)
{
	$n_order = count($a_order);
	$s_output = "";
	for ($ii = 0 ; $ii < $n_order ; $ii++)
	{
		$s_name = $a_order[$ii];
		if (isset($a_fields[$s_name]))
			$s_output .= "$s_name: ".$a_fields[$s_name].$s_line_feed;
	}
	return ($s_output);
}

    //
    // Check if a field name is special. Returns true if it is.
    //
function IsSpecialField($s_name)
{
    global  $SPECIAL_FIELDS;

	return (in_array($s_name,$SPECIAL_FIELDS));
}

    //
    // Set a special field value.
    //
function SetSpecialField($s_name,$m_value)
{
    global  $SPECIAL_VALUES;

		//
		// special values cannot be arrays; ignore them if they are
		//
	if (!is_array($m_value))
		$SPECIAL_VALUES[$s_name] = SpecialCleanValue($s_name,$m_value);
}

    //
    // Check if a field name is a special "multi" field.
    // A multi field is the name plus a sequence number.  For example,
    //      conditions1
    //      conditions2
    // Returns a list (array) if it is, otherwise false if not.
    // The list contains:
    //      1. the name of the special multi field
    //      2. the index number for multi field
    //
function IsSpecialMultiField($s_name)
{
    global  $SPECIAL_MULTI;

	foreach ($SPECIAL_MULTI as $s_multi_fld)
	{
		$i_len = strlen($s_multi_fld);
			//
			// look for nameN where N is a number starting from 1
			//
		if (substr($s_name,0,$i_len) == $s_multi_fld)
		{
			$i_index = (int) substr($s_name,$i_len);
			if ($i_index > 0)
			{
					//
					// re-index to zero
					//
				--$i_index;
                return (array($s_multi_fld,$i_index));
			}
		}
	}
    return (false);
}

    //
    // Set a multi field value.
    //
function SetSpecialMultiField($s_name,$i_index,$m_value)
{
    global  $SPECIAL_VALUES;

        //
        // special fields cannot be arrays - ignore if it is
        //
	if (!is_array($m_value))
		$SPECIAL_VALUES[$s_name][$i_index] = SpecialCleanValue($s_name,$m_value);
}

    //
    // Process a field
    //
function ProcessField($s_name,$raw_value,&$a_order,&$a_fields,&$a_raw_fields)
{
    global  $FORMATTED_INPUT;

		//
		// fields go into an array of special values or an array of other values
		//
	$b_special = false;
	if (IsSpecialField($s_name))
	{
        SetSpecialField($s_name,$raw_value);
		$b_special = true;
	}
		//
		// check for multiple valued special fields
		//
    if (($a_multi_fld = IsSpecialMultiField($s_name)) !== false)
    {
        SetSpecialMultiField($a_multi_fld[0],$a_multi_fld[1],$raw_value);
		$b_special = true;
    }
	if (!$b_special)
	{
			//
			// return the raw value unchanged in the $a_raw_fields array
			//
		$a_raw_fields[$s_name] = $raw_value;
			//
			// handle checkboxes and multiple-selection lists
			// Thanks go to Theodore Boardman for the suggestion
			// and initial working code.
			//
		if (is_array($raw_value))
		{
				//
				// the array must be an array of scalars (not an array
				// of arrays, for example)
				//
			if (is_scalar($raw_value[0]))
			{
				$a_cleaned_values = CleanValue($raw_value);
					//
					// the output is a comma separated list of values for the
					// checkbox.  For example,
					//			events: Diving,Cycling,Running
					//
					// Set the clean value to the list of cleaned checkbox
					// values.
					// First, remove any commas in the values themselves.
					//
				$a_cleaned_values = str_replace(",","",$a_cleaned_values);
				$s_cleaned_value = implode(",",$a_cleaned_values);
			}
			else
				$s_cleaned_value = "<invalid list>";
		}
		else
		{
                //
                // NOTE: there is a minor bug here now that we support
                // $FORM_INI_FILE. The INI file is processed at the end
                // so if you set the mail_options below in the INI file they
                // won't get processed here.  This means you must set
                // the following mail_options in the HTML form for now.
                // (To be fixed at a later date.  RJR 17-Feb-06).
                //

				//
				// if the form specifies the "KeepLines" option,
				// don't strip new lines
				//
			if (IsMailOptionSet("KeepLines") && strpos($raw_value,"\n") !== false)
			{
					//
					// truncate first
					//
				$s_truncated = substr("$raw_value",0,MAXSTRING);
					//
					// split into lines, clean each individual line,
					// then put it back together again
					//
				$a_lines = explode("\n",$s_truncated);
				$a_lines = CleanValue($a_lines);
				$s_cleaned_value = implode(BODY_LF,$a_lines);
					//
					// and, for this special case, prepend a new line
					// so that the value is shown on a fresh line
					//
				$s_cleaned_value = BODY_LF.$s_cleaned_value;
			}
			else
				$s_cleaned_value = CleanValue($raw_value);
		}
			//
			// if the form specifies the "NoEmpty" option, skip
			// empty values.
			//
		if (!IsMailOptionSet("NoEmpty") || !IsFieldEmpty($s_cleaned_value))
			if (!IsMailExcluded($s_name))
			{
					//
					// by default, we maintain the order as passed in
					// the HTTP request
					//
				$a_order[] = $s_name;
				$a_fields[$s_name] = $s_cleaned_value;
			}

			//
			// add to the $FORMATTED_INPUT array for debugging and
			// error reporting
			//
		array_push($FORMATTED_INPUT,"$s_name: '$s_cleaned_value'");
	}
}

	//
	// Parse the input variables and return:
	//	1. an array that specifies the required field order in the output
	//	2. an array containing the non-special cleaned field values indexed
	//	   by field name.
	//	3. an array containing the non-special raw field values indexed by
	//	   field name.
	//
function ParseInput($a_vars)
{
	$a_order = array();
	$a_fields = array();
	$a_raw_fields = array();
        //
        // scan the array of values passed in (name-value pairs) and
        // produce slightly formatted (not HTML) textual output
		// and extract any special values found.
        //
	foreach ($a_vars as $s_name=>$raw_value)
        ProcessField($s_name,$raw_value,$a_order,$a_fields,$a_raw_fields);

    return (array($a_order,$a_fields,$a_raw_fields));
}

    //
    // Get the URL for sending to the CRM.
    //
function GetCRMURL($spec,$vars,$url)
{
    $bad = false;
    $list = TrimArray(explode(",",$spec));
	$map = array();
    for ($ii = 0 ; $ii < count($list) ; $ii++)
    {
        $name = $list[$ii];
        if ($name)
        {
                //
                // the specification must be in this format:
                //      form-field-name:CRM-field-name
                //
            if (($i_crm_name_pos = strpos($name,":")) > 0)
            {
                $s_crm_name = substr($name,$i_crm_name_pos + 1);
                $name = substr($name,0,$i_crm_name_pos);
				if (isset($vars[$name]))
				{
					$map[] = $s_crm_name."=".urlencode($vars[$name]);
					$map[] = "Orig_".$s_crm_name."=".urlencode($name);
				}
            }
			else
			{
					//
					// not the right format, so just include as a parameter
					// check for name=value format to choose encoding
					//
				$a_values = explode("=",$name);
				if (count($a_values) > 1)
					$map[] = urlencode($a_values[0])."=".urlencode($a_values[1]);
				else
					$map[] = urlencode($a_values[0]);
			}
        }
    }
	if (count($map) == 0)
		return ("");
	return (AddURLParams($url,$map,false));
}

	//
	// strip the HTML from a string
	//
function StripHTML($s_str,$s_line_feed = "\n")
{
		//
		// strip HTML comments (s option means include new lines in matches)
		//
	$s_str = preg_replace('/<!--([^-]*([^-]|-([^-]|-[^>])))*-->/s','',$s_str);
		//
		// strip any scripts (i option means case-insensitive)
		//
	$s_str = preg_replace('/<script[^>]*?>.*?<\/script[^>]*?>/si','',$s_str);
		//
		// replace paragraphs with new lines (line feeds)
		//
	$s_str = preg_replace('/<p[^>]*?>/i',$s_line_feed,$s_str);
		//
		// replace breaks with new lines (line feeds)
		//
	$s_str = preg_replace('/<br[[:space:]]*\/?[[:space:]]*>/i',$s_line_feed,$s_str);
		//
		// overcome this bug: http://bugs.php.net/bug.php?id=21311
		//
	$s_str = preg_replace('/<![^>]*>/s','',$s_str);
		//
		// get rid of all HTML tags
		//
	$s_str = strip_tags($s_str);
	return ($s_str);
}

	//
	// Check for valid URL in TARGET_URLS
	//
function CheckValidURL($s_url)
{
	global	$TARGET_URLS;

	foreach ($TARGET_URLS as $s_prefix)
		if (!empty($s_prefix) &&
				strtolower(substr($s_url,0,strlen($s_prefix))) ==
				strtolower($s_prefix))
			return (true);
	return (false);
}

	//
	// Scan the given data for fields returned from the CRM.
	// A field has this following format:
	//		__FIELDNAME__=value
	// terminated by a line feed.
	//
function FindCRMFields($s_data)
{
	$a_ret = array();
	if (preg_match_all('/^__([A-Za-z][A-Za-z0-9_]*)__=(.*)$/m',$s_data,$a_matches) === false)
		SendAlert(GetMessage(MSG_PREG_FAILED));
	else
	{
		$n_matches = count($a_matches[0]);
	//	SendAlert("$n_matches on '$s_data'");
		for ($ii = 0 ; $ii < $n_matches ; $ii++)
			if (isset($a_matches[1][$ii]) && isset($a_matches[2][$ii]))
				$a_ret[$a_matches[1][$ii]] = $a_matches[2][$ii];
	}
	return ($a_ret);
}

	//
	// open the given URL to send data to it, we expect the response
	// to contain at least '__OK__=' followed by true or false
	//
function SendToCRM($s_url,&$a_data)
{
	global	$php_errormsg;

	if (!CheckValidURL($s_url))
	{
		SendAlert(GetMessage(MSG_URL_INVALID,array("URL"=>$s_url)));
		return (false);
	}
@	$fp = fopen($s_url,"r");
	if ($fp === false)
	{
		SendAlert(GetMessage(MSG_URL_OPEN,array("URL"=>$s_url,
										"ERROR"=>CheckString($php_errormsg))));
		return (false);
	}
	$s_mesg = "";
	while (!feof($fp))
	{
		$s_line = fgets($fp,4096);
		$s_mesg .= $s_line;
	}
	fclose($fp);
	$s_mesg = StripHTML($s_mesg);
	$s_result = preg_match('/__OK__=(.*)/',$s_mesg,$a_matches);
	if (count($a_matches) < 2 || $a_matches[1] === "")
	{
			//
			// no agreed __OK__ value returned - assume system error
			//
		SendAlert(GetMessage(MSG_CRM_FAILED,array("URL"=>$s_url,
												"MSG"=>$s_mesg)));
		return (false);
	}
		//
		// look for fields to return
		//
	$a_data = FindCRMFields($s_mesg);
		//
		// check for success or user error
		//
	switch (strtolower($a_matches[1]))
	{
	case "true":
		break;
	case "false":
			//
			// user error
			//
		$s_error_code = "crm_error";
		$s_error_mesg = GetMessage(MSG_CRM_FORM_ERROR);
		if (isset($a_data["USERERRORCODE"]))
			$s_error_code .= $a_data["USERERRORCODE"];
		if (isset($a_data["USERERRORMESG"]))
			$s_error_mesg = $a_data["USERERRORMESG"];
		UserError($s_error_code,$s_error_mesg);
			// no return
		break;
	}
	return (true);
}

	//
	// Split into field name and friendly name; returns an array with
	// two elements.
	// Format is:
	//		fieldname:Nice printable name for displaying
	//
function GetFriendlyName($s_name)
{
	if (($i_pos = strpos($s_name,':')) === false)
		return (array(trim($s_name),trim($s_name)));
	return (array(trim(substr($s_name,0,$i_pos)),trim(substr($s_name,$i_pos+1))));
}

define("REQUIREDOPS","|^!=");		// operand characters for advanced required processing

	//
	// Perform a field comparison test.
	//
function FieldTest($s_oper,$s_fld1,$s_fld2,$a_vars,&$s_error_mesg,
						$s_friendly1 = "",$s_friendly2 = "")
{
	$b_ok = true;
		//
		// perform the test
		//
	switch ($s_oper)
	{
	case '&':		// both fields must be present
		if (!TestFieldEmpty($s_fld1,$a_vars,$s_empty1) &&
            !TestFieldEmpty($s_fld2,$a_vars,$s_empty2))
			;		// OK
		else
		{
				//
				// failed
				//
			$s_error_mesg = GetMessage(MSG_AND,array("ITEM1"=>$s_friendly1,
													"ITEM2"=>$s_friendly2));
			$b_ok = false;
		}
		break;
	case '|':		// either field or both must be present
		if (!TestFieldEmpty($s_fld1,$a_vars,$s_empty1) ||
            !TestFieldEmpty($s_fld2,$a_vars,$s_empty2))
			;		// OK
		else
		{
				//
				// failed
				//
			$s_error_mesg = GetMessage(MSG_OR,array("ITEM1"=>$s_friendly1,
													"ITEM2"=>$s_friendly2));
			$b_ok = false;
		}
		break;
	case '^':		// either field but not both must be present
        $b_got1 = !TestFieldEmpty($s_fld1,$a_vars,$s_empty1);
        $b_got2 = !TestFieldEmpty($s_fld2,$a_vars,$s_empty2);
		if ($b_got1 || $b_got2)
		{
			if ($b_got1 && $b_got2)
			{
					//
					// failed
					//
				$s_error_mesg = GetMessage(MSG_NOT_BOTH,
											array("ITEM1"=>$s_friendly1,
												  "ITEM2"=>$s_friendly2));
				$b_ok = false;
			}
		}
		else
		{
				//
				// failed
				//
			$s_error_mesg = GetMessage(MSG_XOR,
										array("ITEM1"=>$s_friendly1,
											  "ITEM2"=>$s_friendly2));
			$b_ok = false;
		}
		break;
	case '!=':
	case '=':
        $b_got1 = !TestFieldEmpty($s_fld1,$a_vars,$s_empty1);
        $b_got2 = !TestFieldEmpty($s_fld2,$a_vars,$s_empty2);
		if ($b_got1 && $b_got2)
			$b_match = (GetFieldValue($s_fld1,$a_vars) ==
                            GetFieldValue($s_fld2,$a_vars));
		elseif (!$b_got1 && !$b_got2)
				//
				// haven't got either value - they match
				//
			$b_match = true;
		else
				//
				// got one value, but not the other - they don't match
				//
			$b_match = false;
		if ($s_oper != '=')
		{
				//
				// != operator
				//
			$b_match = !$b_match;
			$s_desc = GetMessage(MSG_IS_SAME_AS,
										array("ITEM1"=>$s_friendly1,
											  "ITEM2"=>$s_friendly2));
		}
		else
			$s_desc = GetMessage(MSG_IS_NOT_SAME_AS,
										array("ITEM1"=>$s_friendly1,
											  "ITEM2"=>$s_friendly2));
		if (!$b_match)
		{
				//
				// failed
				//
			$s_error_mesg = $s_desc;
			$b_ok = false;
		}
		break;
	}
	return ($b_ok);
}

	//
	// Process advanced "required" conditionals
	//
function AdvancedRequired($s_cond,$i_span,$a_vars,&$s_missing,&$a_missing_list)
{
	$b_ok = true;
		//
		// get first field name
		//
	list($s_fld1,$s_friendly1) = GetFriendlyName(substr($s_cond,0,$i_span));
		//
		// get the operator
		//
	$s_rem = substr($s_cond,$i_span);
	$i_span = strspn($s_rem,REQUIREDOPS);
	$s_oper = substr($s_rem,0,$i_span);
	switch ($s_oper)
	{
	case '|':
	case '^':
	case '=':
	case '!=':
			//
			// second component is a field name
			//
		list($s_fld2,$s_friendly2) = GetFriendlyName(substr($s_rem,$i_span));
		if (!FieldTest($s_oper,$s_fld1,$s_fld2,$a_vars,$s_error_mesg,
													$s_friendly1,$s_friendly2))
		{
				//
				// failed
				//
			$s_missing .= "$s_error_mesg\n";
			$a_missing_list[] = "$s_error_mesg";
			$b_ok = false;
		}
		break;
	default:
		SendAlert(GetMessage(MSG_REQD_OPER,array("OPER"=>$s_oper)));
		break;
	}
	return ($b_ok);
}

    //
    // Check the input for required values.  The list of required fields
    // is a comma-separated list of field names or conditionals
    //
function CheckRequired($s_reqd,$a_vars,&$s_missing,&$a_missing_list)
{
    $b_bad = false;
    $a_list = TrimArray(explode(",",$s_reqd));
	$s_missing = "";
	$a_missing_list = array();
    for ($ii = 0 ; $ii < count($a_list) ; $ii++)
    {
        $s_cond = $a_list[$ii];
		$i_len = strlen($s_cond);
		if ($i_len <= 0)
			continue;
		if (($i_span = strcspn($s_cond,REQUIREDOPS)) >= $i_len)
		{
				//
				// no advanced operator; just a field name
				//
			list($s_fld,$s_friendly) = GetFriendlyName($s_cond);
            if (TestFieldEmpty($s_fld,$a_vars,$s_mesg))
			{
                if ($s_mesg === "")
                    $s_mesg = "$s_friendly";
                else
                    $s_mesg = "$s_friendly ($s_mesg)";
				$b_bad = true;
				$s_missing .= "$s_mesg\n";
				$a_missing_list[] = "$s_mesg";
			}
		}
		elseif (!AdvancedRequired($s_cond,$i_span,$a_vars,
									$s_missing,$a_missing_list))
			$b_bad = true;
    }
    return (!$b_bad);
}

	//
	// Run a condition test
	//
function RunTest($s_test,$a_vars)
{
	global	$aAlertInfo;

	$s_op_chars = "&|^!=~#<>";		// these are the characters for the operators
	$i_len = strlen($s_test);
	$b_ok = true;
	if ($i_len <= 0)
			//
			// empty test - true
			//
		;
	elseif ($s_test == "!")
			//
			// test asserts false
			//
		$b_ok = false;
	elseif (($i_span = strcspn($s_test,$s_op_chars)) >= $i_len)
			//
			// no operator - just check field presence
			//
		$b_ok = !TestFieldEmpty($s_test,$a_vars,$s_mesg);
	else
	{
			//
			// get first field name
			//
		$s_fld1 = trim(substr($s_test,0,$i_span));
			//
			// get the operator
			//
		$s_rem = substr($s_test,$i_span);
		$i_span = strspn($s_rem,$s_op_chars);
		$s_oper = substr($s_rem,0,$i_span);
		switch ($s_oper)
		{
		case '&':
		case '|':
		case '^':
		case '=':
		case '!=':
				//
				// get the second field name
				//
			$s_fld2 = trim(substr($s_rem,$i_span));
			$b_ok = FieldTest($s_oper,$s_fld1,$s_fld2,$a_vars,$s_error_mesg);
			break;
		case '~':
		case '!~':
				//
				// get the regular expression
				//
			$s_pat = trim(substr($s_rem,$i_span));
			if (!TestFieldEmpty($s_fld1,$a_vars,$s_mesg))
				$s_value = GetFieldValue($s_fld1,$a_vars);
			else
				$s_value = "";
			//echo "<p>Pattern: '".htmlspecialchars($s_pat)."': count=".preg_match($s_pat,$s_value)."<br /></p>";
				//
				// match the regular expression
				//
			if (preg_match($s_pat,$s_value) > 0)
				$b_ok = ($s_oper == '~');
			else
				$b_ok = ($s_oper == '!~');
			if (!$b_ok)
				$aAlertInfo[] = GetMessage(MSG_PAT_FAILED,array("OPER"=>$s_oper,
															"PAT"=>$s_pat,
															"VALUE"=>$s_value));
			break;
		case '#=':
		case '#!=':
		case '#<':
		case '#>':
		case '#<=':
		case '#>=':
				//
				// numeric tests
				//
			$s_num = trim(substr($s_rem,$i_span));
                //
                // if this is a file field, get the size of the file for
                // numeric tests
                //
            if (($s_value = GetFileSize($s_fld1)) === false)
                $s_value = $a_vars[$s_fld1];
			if (strpos($s_num,'.') === false)
			{
					//
					// treat as integer
					//
				$m_num = (int) $s_num;
				$m_fld = (int) $s_value;
			}
			else
			{
					//
					// treat as floating point
					//
				$m_num = (float) $s_num;
				$m_fld = (float) $s_value;
			}
			switch ($s_oper)
			{
			case '#=':
				$b_ok = ($m_fld == $m_num);
				break;
			case '#!=':
				$b_ok = ($m_fld != $m_num);
				break;
			case '#<':
				$b_ok = ($m_fld < $m_num);
				break;
			case '#>':
				$b_ok = ($m_fld > $m_num);
				break;
			case '#<=':
				$b_ok = ($m_fld <= $m_num);
				break;
			case '#>=':
				$b_ok = ($m_fld >= $m_num);
				break;
			}
			break;
		default:
			SendAlert(GetMessage(MSG_COND_OPER,array("OPER"=>$s_oper)));
			break;
		}
	}
	return ($b_ok);
}

    //
    // Check the input for condition tests.
    //
function CheckConditions($m_conditions,$a_vars,&$s_missing,&$a_missing_list,$m_id = false)
{
	if (is_array($m_conditions))
	{
            //
            // Sort the conditions by their numeric value.  This ensures
            // conditions are executed in the right order.
            //
        ksort($m_conditions,SORT_NUMERIC);
		foreach ($m_conditions as $m_key=>$s_cond)
			if (!CheckConditions($s_cond,$a_vars,$s_missing,$a_missing_list,$m_key))
				return (false);
		return (true);
	}
	$s_fld_name = "conditions".($m_id === false ? "" : ($m_id+1));
	if (!is_string($m_conditions))
	{
		SendAlert(GetMessage(MSG_INV_COND,array("FLD"=>$s_fld_name)));
		return (true);	// pass invalid conditions
	}
	if ($m_conditions == "")
		return (true);	// pass empty conditions
	$s_cond = $m_conditions;
		//
		// extract the separator characters
		//
	if (strlen($s_cond) < 2)
	{
		SendAlert(GetMessage(MSG_COND_CHARS,
						array("FLD"=>$s_fld_name,"COND"=>$s_cond)));
		return (true);	// pass invalid conditions
	}
	$s_list_sep = $s_cond{0};
	$s_int_sep = $s_cond{1};
	$s_full_cond = $s_cond = substr($s_cond,2);
    $b_bad = false;
    $a_list = TrimArray(explode($s_list_sep,$s_cond));
	$s_missing = "";
	$a_missing_list = array();
    for ($ii = 0 ; $ii < count($a_list) ; $ii++)
    {
        $s_cond = $a_list[$ii];
		$i_len = strlen($s_cond);
		if ($i_len <= 0)
			continue;
			//
			// split the condition into its internal components
			//
		$a_components = TrimArray(explode($s_int_sep,$s_cond));
		if (count($a_components) < 5)
		{
			SendAlert(GetMessage(MSG_COND_INVALID,
						array("FLD"=>$s_fld_name,"COND"=>$s_cond,
							  "SEP"=>$s_int_sep)));
				//
				// the smallest condition has 5 components
				//
			continue;
		}
			//
			// first component is ignored (it's blank)
			//
		$a_components = array_slice($a_components,1);
		switch ($a_components[0])
		{
		case "TEST":
			if (count($a_components) > 5)
			{
				SendAlert(GetMessage(MSG_COND_TEST_LONG,
						array("FLD"=>$s_fld_name,"COND"=>$s_cond,
							  "SEP"=>$s_list_sep)));
				continue;
			}
			if (!RunTest($a_components[1],$a_vars))
			{
				$s_missing .= $a_components[2]."\n";
				$a_missing_list[] = $a_components[2];
				$b_bad = true;
			}
			break;
		case "IF":
			if (count($a_components) < 6)
			{
				SendAlert(GetMessage(MSG_COND_IF_SHORT,
						array("FLD"=>$s_fld_name,"COND"=>$s_cond,
							  "SEP"=>$s_int_sep)));
				continue;
			}
			if (count($a_components) > 7)
			{
				SendAlert(GetMessage(MSG_COND_IF_LONG,
						array("FLD"=>$s_fld_name,"COND"=>$s_cond,
							  "SEP"=>$s_list_sep)));
				continue;
			}
			if (RunTest($a_components[1],$a_vars))
				$b_test = RunTest($a_components[2],$a_vars);
			else
				$b_test = RunTest($a_components[3],$a_vars);
			if (!$b_test)
			{
				$s_missing .= $a_components[4]."\n";
				$a_missing_list[] = $a_components[4];
				$b_bad = true;
			}
			break;
		default:
			SendAlert(GetMessage(MSG_COND_UNK,
						array("FLD"=>$s_fld_name,"COND"=>$s_cond,
							  "CMD"=>$a_components[0])));
			break;
		}
    }
    return (!$b_bad);
}

    //
    // Return a formatted list of the given environment variables.
    //
function GetEnvVars($list,$s_line_feed)
{
	global	$VALID_ENV,$aServerVars;

    $output = "";
    for ($ii = 0 ; $ii < count($list) ; $ii++)
	{
	    $name = $list[$ii];
		if ($name && array_search($name,$VALID_ENV,true) !== false)
		{
				//
				// if the environment variable is empty or non-existent, try
				// looking for the value in the server vars.
				//
			if (($s_value = getenv($name)) === "" || $s_value === false)
				if (isset($aServerVars[$name]))
					$s_value = $aServerVars[$name];
				else
					$s_value = "";
		    $output .= $name."=".$s_value.$s_line_feed;
		}
	}
    return ($output);
}
	//
	// open a socket connection to a filter and post the data there
	//
function SocketFilter($filter,$a_filter_info,$m_data)
{
	static	$b_in_here = false;
	global	$php_errormsg;

		//
		// prevent recursive errors
		//
	if ($b_in_here)
		return ("<DATA DISCARDED>");
	$b_in_here = true;

	$a_errors = array();
	if (!isset($a_filter_info["site"]))
		$a_errors[] = GetMessage(MSG_MISSING,array("ITEM"=>"site"));
	else
		$s_site = $a_filter_info["site"];

	if (!isset($a_filter_info["port"]))
		$a_errors[] = GetMessage(MSG_MISSING,array("ITEM"=>"port"));
	else
		$i_port = (int) $a_filter_info["port"];

	if (!isset($a_filter_info["path"]))
		$a_errors[] = GetMessage(MSG_MISSING,array("ITEM"=>"path"));
	else
		$s_path = $a_filter_info["path"];

	if (!isset($a_filter_info["params"]))
		$a_params = array();
	elseif (!is_array($a_filter_info["params"]))
		$a_errors[] = GetMessage(MSG_NEED_ARRAY,array("ITEM"=>"params"));
	else
		$a_params = $a_filter_info["params"];

	if (!empty($a_errors))
	{
   		Error("bad_filter",GetMessage(MSG_FILTER_WRONG,array(
							"FILTER"=>$filter,
							"ERRORS"=>implode(', ',$a_errors))),false,false);
		exit;
	}

		//
		// ready to build the socket - we need a longer time limit for the
		// script if we're doing this; we allow 30 seconds for the connection
		// (should be instantaneous, especially if it's the same domain)
		//
	set_time_limit(60);
@	$f_sock = fsockopen($s_site,$i_port,$i_errno,$s_errstr,30);
	if ($f_sock === false)
	{
   		Error("filter_connect",GetMessage(MSG_FILTER_CONNECT,array(
							"FILTER"=>$filter,
							"SITE"=>$s_site,
							"ERRNUM"=>$i_errno,
							"ERRSTR"=>"$s_errstr (".CheckString($php_errormsg).")")),
							false,false);
		exit;
	}
		//
		// build the data to send
		//
	$m_request_data = array();
	$i_count = 0;
	foreach ($a_params as $m_var)
	{
		$i_count++;
			//
			// if the parameter spec is an array, process it specially;
			// it must have "name" and "file" elements
			//
		if (is_array($m_var))
		{
			if (!isset($m_var["name"]))
			{
				Error("bad_filter",GetMessage(MSG_FILTER_PARAM,
									array("FILTER"=>$filter,
										  "NUM"=>$i_count,
										  "NAME"=>"name")),false,false);
				fclose($f_sock);
				exit;
			}
			$s_name = $m_var["name"];
			if (!isset($m_var["file"]))
			{
				Error("bad_filter",GetMessage(MSG_FILTER_PARAM,
									array("FILTER"=>$filter,
										  "NUM"=>$i_count,
										  "NAME"=>"file")),false,false);
				fclose($f_sock);
				exit;
			}
				//
				// open the file and read its contents
				//
@			$fp = fopen($m_var["file"],"r");
			if ($fp === false)
			{
				Error("filter_error",GetMessage(MSG_FILTER_OPEN_FILE,
									array("FILTER"=>$filter,
										  "FILE"=>$m_var["file"],
										  "ERROR"=>CheckString($php_errormsg))),false,false);
				fclose($f_sock);
				exit;
			}
			$s_data = "";
			$n_lines = 0;
			while (!feof($fp))
			{
				if (($s_line = fgets($fp,2048)) === false)
					if (feof($fp))
						break;
					else
					{
						Error("filter_error",GetMessage(MSG_FILTER_FILE_ERROR,
									array("FILTER"=>$filter,
										  "FILE"=>$m_var["file"],
										  "ERROR"=>CheckString($php_errormsg),
										  "NLINES"=>$n_lines)),false,false);
						fclose($f_sock);
						exit;
					}
				$s_data .= $s_line;
				$n_lines++;
			}

			fclose($fp);
			$m_request_data[] = "$s_name=".urlencode($s_data);
		}
		else
    		$m_request_data[] = (string) $m_var;
	}
		//
		// add the data
		//
	if (is_array($m_data))
		$m_request_data[] = "data=".urlencode(implode(BODY_LF,$m_data));
	else
		$m_request_data[] = "data=".urlencode($m_data);
	$s_request = implode("&",$m_request_data);

	if (($i_pos = strpos($s_site,"://")) !== false)
		$s_site_name = substr($s_site,$i_pos+3);
	else
		$s_site_name = $s_site;

	fputs($f_sock,"POST $s_path HTTP/1.0\r\n");
	fputs($f_sock,"Host: $s_site_name\r\n");
	fputs($f_sock,"Content-Type: application/x-www-form-urlencoded\r\n");
	fputs($f_sock,"Content-Length: ".strlen($s_request)."\r\n");
	fputs($f_sock,"\r\n");
	fputs($f_sock,"$s_request\r\n");

		//
		// now read the response
		//
	$m_hdr = "";
	$m_data = "";
	$b_in_hdr = true;
	$b_ok = false;
	while (!feof($f_sock))
	{
		if (($s_line = fgets($f_sock,2048)) === false)
			if (feof($f_sock))
				break;
			else
			{
				Error("filter_failed",GetMessage(MSG_FILTER_READ_ERROR,
							array("FILTER"=>$filter,
								  "ERROR"=>CheckString($php_errormsg))),false,false);
				fclose($f_sock);
				exit;
			}
			//
			// look for an "__OK__" line
			//
		if (trim($s_line) == "__OK__")
			$b_ok = true;
		elseif ($b_in_hdr)
		{
				//
				// blank line signals end of header
				//
			if (trim($s_line) == "")
				$b_in_hdr = false;
			else
				$m_hdr .= $s_line;
		}
		else
			$m_data .= $s_line;
	}
		//
		// if not OK, then report error
		//
	if (!$b_ok)
	{
		Error("filter_failed",GetMessage(MSG_FILTER_NOT_OK,
					array("FILTER"=>$filter,
						  "DATA"=>$m_data)),false,false);
		fclose($f_sock);
		exit;
	}
	fclose($f_sock);
	$b_in_here = false;
	return ($m_data);
}

	//
	// run data through a supported filter
	//
function Filter($filter,$m_data)
{
  	global	$FILTERS,$SOCKET_FILTERS;
	static	$b_in_here = false;

		//
		// prevent recursive errors
		//
	if ($b_in_here)
		return ("<DATA DISCARDED>");
	$b_in_here = true;

		//
		// Any errors sent in an alert are flagged to not run through the
		// filter - this also means the user's data won't be included in the
		// alert.
		// The reason for this is that the Filter is typically an encryption
		// program. If the filter fails, then sending the user's data in
		// clear text in an alert breaks the security of having encryption
		// in the first place!
		//

		//
		// find the filter
		//
	if (!isset($FILTERS[$filter]) || $FILTERS[$filter] == "")
	{
			//
			// check for SOCKET_FILTERS
			//
		if (!isset($SOCKET_FILTERS[$filter]) || $SOCKET_FILTERS[$filter] == "")
		{
			Error("bad_filter",GetMessage(MSG_FILTER_UNK,
						array("FILTER"=>$filter)),false,false);
			exit;
		}
		$m_data = SocketFilter($filter,$SOCKET_FILTERS[$filter],$m_data);
	}
	elseif ($FILTERS[$filter] == "null")
            //
            // do nothing - just return the original data unchanged
            //
        ;
    else
	{
	    $cmd = $FILTERS[$filter];
			//
			// get the program name - assumed to be the first blank-separated word
			//
		$a_words = preg_split('/\s+/',$cmd);
		$prog = $a_words[0];

		$s_cwd = getcwd();
			//
			// change to the directory that contains the filter program
			//
		$dirname = dirname($prog);
		if ($dirname != "" && $dirname != "." && !chdir($dirname))
		{
			Error("chdir_filter",GetMessage(MSG_FILTER_CHDIR,
						array("DIR"=>$dirname,"FILTER"=>$filter,
							  "ERROR"=>CheckString($php_errormsg))),false,false);
			exit;
		}

			//
			// the output of the filter goes to a temporary file; this works
			// OK on Windows too, even with the Unix shell syntax.
			//
		$temp_file = GetTempName("FMF");
		$cmd = "$cmd > $temp_file 2>&1";
			//
			// start the filter
			//
		$pipe = popen($cmd,"w");
		if ($pipe === false)
		{
			$s_sv_err = CheckString($php_errormsg);
			$err = join('',file($temp_file));
			unlink($temp_file);
			Error("filter_not_found",GetMessage(MSG_FILTER_NOTFOUND,
						array("CMD"=>$cmd,"FILTER"=>$filter,
							  "ERROR"=>$s_sv_err)),false,false,$err);
			exit;
		}
			//
			// write the data to the filter
			//
		if (is_array($m_data))
			fwrite($pipe,implode(BODY_LF,$m_data));
		else
			fwrite($pipe,$m_data);
		if (($i_st = pclose($pipe)) != 0)
		{
			$s_sv_err = CheckString($php_errormsg);
			$err = join('',file($temp_file));
			unlink($temp_file);
			Error("filter_failed",GetMessage(MSG_FILTER_ERROR,
						array("FILTER"=>$filter,
							  "ERROR"=>$s_sv_err,
							  "STATUS"=>$i_st)),false,false,$err);
			exit;
		}
			//
			// read in the filter's output and return as the data to be sent
			//
		$m_data = join('',file($temp_file));
		unlink($temp_file);

			//
			// return to previous directory
			//
		chdir($s_cwd);
	}
	$b_in_here = false;
	return ($m_data);
}

$aSubstituteErrors = array();
$aSubstituteValues = NULL;
$sSubstituteMissing = NULL;

	//
	// Run htmlspecialchars on every value in an array.
	//
function ArrayHTMLSpecialChars($a_list)
{
	$a_new = array();
	foreach ($a_list as $m_key=>$m_value)
		if (is_array($m_value))
			$a_new[$m_key] = ArrayHTMLSpecialChars($m_value);
		else
			$a_new[$m_key] = htmlspecialchars($m_value);
	return ($a_new);
}

	//
	// Worker function for SubstituteValue and SubstituteValueForPage.
	// Returns the value of the matched variable name.
	// Variables are searched for in the global $aSubstituteValues.
	// If no such variable exists, an error is reported or the given
	// replacement string is used.
	// Errors are stored in the global $aSubstituteErrors.
	//
function SubstituteValueWorker($a_matches,$s_repl,$b_html = true)
{
	global	$aSubstituteErrors,$aSubstituteValues,$SPECIAL_VALUES;

    $b_insert_br = true;       // option to put "<br />" tags before newlines in HTML templates

	$s_name = $a_matches[0];
    assert(strlen($s_name) > 1 && $s_name{0} == '$');
    $s_name = substr($s_name,1);
    if (($i_len = strlen($s_name)) > 0 && $s_name{0} == '{')
    {
        assert($s_name{$i_len-1} == '}');
        $s_name = substr($s_name,1,-1);
            //
            // grab any processing options
            //
        $a_args = explode(":",$s_name);
        $s_name = $a_args[0];
        if (($n_args = count($a_args)) > 1)
        {
            for ($ii = 1 ; $ii < $n_args ; $ii++)
            {
                switch ($a_args[$ii])
                {
                case "nobr":
                    $b_insert_br = false;
                    break;
                }
            }
        }
    }
	$s_value = "";
	if (IsFieldSet($s_name,$aSubstituteValues) &&
        !TestFieldEmpty($s_name,$aSubstituteValues,$s_mesg))
	{
		if (is_array($aSubstituteValues[$s_name]))
				//
				// note that the separator can include HTML special chars
				//
			$s_value = implode($SPECIAL_VALUES['template_list_sep'],
							$b_html ?
							ArrayHTMLSpecialChars($aSubstituteValues[$s_name]) :
							$aSubstituteValues[$s_name]);
		else
        {
            $s_value = GetFieldValue($s_name,$aSubstituteValues);
            if ($b_html)
			    $s_value = htmlspecialchars($s_value);
        }
		if ($b_html && $b_insert_br)
				//
				// Insert HTML line breaks before newlines.
				//
			$s_value = nl2br($s_value);
	}
	elseif (isset($SPECIAL_VALUES[$s_name]))
		$s_value = $b_html ?
						htmlspecialchars((string) $SPECIAL_VALUES[$s_name]) :
						(string) $SPECIAL_VALUES[$s_name];
	elseif (isset($s_repl))
			//
			// If a replacement value has been specified use it, and
			// don't call htmlspecialchars.  This allows the use
			// of HTML tags in a replacement string.
			//
		$s_value = $s_repl;
	else
		$aSubstituteErrors[] = GetMessage(MSG_FLD_NOTFOUND,array("FIELD"=>$s_name));
	return ($s_value);
}

	//
	// Callback function for preg_replace_callback.  Returns the value
	// of the matched variable name.
	// Variables are searched for in the global $aSubstituteValues.
	// If no such variable exists, an error is reported or an special
	// replacement string is used.
	// Errors are stored in the global $aSubstituteErrors.
	//
function SubstituteValue($a_matches)
{
	global	$sSubstituteMissing;

	return (SubstituteValueWorker($a_matches,$sSubstituteMissing));
}

	//
	// Callback function for preg_replace_callback.  Returns the value
	// of the matched variable name.
	// Variables are searched for in the global $aSubstituteValues.
	// If no such variable exists, an error is reported or an special
	// replacement string is used.
	// Errors are stored in the global $aSubstituteErrors.
	//
function SubstituteValuePlain($a_matches)
{
	global	$sSubstituteMissing;

	return (SubstituteValueWorker($a_matches,$sSubstituteMissing,false));
}

	//
	// Callback function for preg_replace_callback.  Returns the value
	// of the matched variable name.
	// Variables are searched for in the global $aSubstituteValues.
	// If no such variable exists, the empty string is substituted.
	// Errors are stored in the global $aSubstituteErrors.
	//
function SubstituteValueForPage($a_matches)
{
	return (SubstituteValueWorker($a_matches,""));
}

	//
	// Process the given HTML template and fill the fields.
	//
function DoProcessTemplate($s_dir,$s_url,$s_template,&$a_lines,
                            $a_values,$s_missing,$s_subs_func)
{
	global	$aSubstituteErrors,$aSubstituteValues,$sSubstituteMissing;

	if (($a_template_lines = LoadTemplate($s_template,$s_dir,
                                            $s_url,true)) === false)
		return (false);

	$b_ok = true;
		//
		// initialize the errors list
		//
	$aSubstituteErrors = array();
		//
		// initialize the values
		//
	$aSubstituteValues = $a_values;
	$sSubstituteMissing = $s_missing;

	foreach ($a_template_lines as $s_line)
	{
			//
			// search for words in these forms:
			//		$word
            //      ${word:options}
			// where word begins with an alphabetic character and
			// consists of alphanumeric and underscore
			//
		$a_lines[] = preg_replace_callback('/\$[a-z][a-z0-9_]*|\$\{[a-z][a-z0-9_]*(:[^\}]*)*\}/i',
											$s_subs_func,$s_line);
	}

//	SendAlert("Error count=".count($aSubstituteErrors));
	if (count($aSubstituteErrors) != 0)
	{
		SendAlert(GetMessage(MSG_TEMPLATE_ERRORS,array("NAME"=>$s_template)).
							implode("\n",$aSubstituteErrors));
		$b_ok = false;
	}
    global  $FMCTemplProc;

        //
        // note that it's possible for an old version of FormMail Computation
        // module to get loaded which doesn't provide FMCTemplProc
        //
    if ($b_ok && ADVANCED_TEMPLATES && isset($FMCTemplProc))
    {
        $a_mesgs = array();
        /*foreach ($a_lines as $i_lno=>$s_line)
            if (strpos($s_line,"\n") !== false)
                SendAlert("Line $i_lno has a newline");*/
        if (($m_result = $FMCTemplProc->Process(implode("\n",$a_lines),$a_mesgs)) === false)
        {
            $s_msgs = "\n";
            foreach ($a_mesgs as $a_msg)
            {
                $s_msgs .= "Line ".$a_msg["LINE"];
                $s_msgs .= ", position ".$a_msg["CHAR"].": ";
                $s_msgs .= $a_msg["MSG"]."\n";
            }
            Error("fmadvtemplates",GetMessage(MSG_TEMPL_PROC,
                        array("ERRORS"=>$s_msgs)),false,false);
            $b_ok = false;
        }
        else
        {
            /*foreach ($m_result as $i_lno=>$s_line)
                if (($nn = substr_count($s_line,"\n")) > 1)
                    SendAlert("Result line $i_lno has $nn newlines");*/
                //
                // strip the new lines
                //
            $a_lines = explode("\n",implode("",$m_result));
        }
        $a_alerts = $FMCTemplProc->GetAlerts();
        if (count($a_alerts) > 0)
            SendAlert(GetMessage(MSG_TEMPL_ALERT,
                        array("ALERTS"=>implode("\n",$a_alerts))));
        $a_debug = $FMCTemplProc->GetDebug();
        if (count($a_debug) > 0)
            SendAlert(GetMessage(MSG_TEMPL_DEBUG,
                        array("DEBUG"=>implode("\n",$a_debug))));
    }

	return ($b_ok);
}

	//
	// Process the given HTML template and fill the fields.
	//
function ProcessTemplate($s_template,&$a_lines,$a_values,$s_missing = NULL,
							$s_subs_func = 'SubstituteValue')
{
    global	$TEMPLATEURL,$TEMPLATEDIR;

	if (empty($TEMPLATEDIR) && empty($TEMPLATEURL))
	{
		SendAlert(GetMessage(MSG_TEMPLATES));
		return (false);
	}
    return (DoProcessTemplate($TEMPLATEDIR,$TEMPLATEURL,$s_template,$a_lines,
                                $a_values,$s_missing,$s_subs_func));
}

	//
	// Output the given HTML template after filling in the fields.
	//
function OutputTemplate($s_template,$a_values)
{
	$a_lines = array();
	if (!ProcessTemplate($s_template,$a_lines,$a_values,"",'SubstituteValueForPage'))
		Error("template_failed",GetMessage(MSG_TEMPLATE_FAILED,
									array("NAME"=>$s_template)),false,false);
	else
	{
		for ($ii = 0 ; $ii < count($a_lines) ; $ii++)
			echo $a_lines[$ii]."\n";
	}
}

	//
	// This function handles input type "text" and "password"
	//
function FixInputText($s_name,$s_value,$s_buf)
{
		//
		// we search for:
		//	<input type="text" name="thename"...
		// and change it to:
		//	<input type="text" name="thename" value="thevalue" ...
		//
		// Note that the value attribute must appear *after* the
		// type and name attributes.
		//

		//
		// first strip any current value attribute for the field
		//

		//
		// (?:) is a grouping subpattern that does no capturing
		//

    	// handle type attribute first
	$s_pat  = '/(<\s*input[^>]*type="(?:text|password)"[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*)(value="[^"]*")([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

		// handle name attribute first
	$s_pat  = '/(<\s*input[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*type="(?:text|password)"[^>]*)(value="[^"]*")([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

		//
		// now add in the new value
		//
	$s_repl  = '$1 value="'.htmlspecialchars($s_value).'" $2>';

		// handle type attribute first
	$s_pat  = '/(<\s*input[^>]*type="(?:text|password)"[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,$s_repl,$s_buf);

		// handle name attribute first
	$s_pat  = '/(<\s*input[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*type="(?:text|password)"[^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,$s_repl,$s_buf);

	return ($s_buf);
}

	//
	// This function handles textareas.
	//
function FixTextArea($s_name,$s_value,$s_buf)
{
		//
		// we search for:
		//	<textarea name="thename"...>value</textarea>
		// and change it to:
		//	<textarea name="thename"...>new value</textarea>
		//

	$s_pat  = '/(<\s*textarea[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*)>.*?<\s*\/\s*textarea\s*>';
	$s_pat .= '/ims';
        //
        // we exclude the closing '>' from the match above so that
        // we can put it below.  We need to do this so that the replacement
        // string is not faulty if the value begins with a digit:
        //      $19 Some Street
        //
	$s_repl = '$1>'.htmlspecialchars($s_value).'</textarea>';
	$s_buf = preg_replace($s_pat,$s_repl,$s_buf);

	return ($s_buf);
}

	//
	// This function handles radio buttons and non-array checkboxes.
	//
function FixButton($s_name,$s_value,$s_buf)
{
		//
		// we search for:
		//	<input type="radio" name="thename" value="thevalue" ...
		// and change it to:
		//	<input type="radio" name="thename" value="thevalue" checked="checked"
		//
		// Note that the value attribute must appear *after* the
		// type and name attributes.
		//

		//
		// first strip any current checked attributes
		//

		//
		// (?:) is a grouping subpattern that does no capturing
		//

		// handle type attribute first
        // match: input tag with type 'radio' or 'checkbox' with attribute
        // 'checked' or 'checked="checked"'
        //              <A NAME="PatternInfo">
        //      [^>]*?[^"\w] matches up to a word boundary starting with
        //      'checked' but not '"checked'
        //      (="checked"|(?=[^"\w]))? this matches:
        //              nothing
        //              ="checked"
        //              any character except a word character or " (without
        //              consuming it)
        //
	$s_pat  = '/(<\s*input[^>]*type="(?:radio|checkbox)"[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

		// handle name attribute first
	$s_pat  = '/(<\s*input[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*type="(?:radio|checkbox)"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

		// handle type attribute first
	$s_pat  = '/(<\s*input[^>]*type="(?:radio|checkbox)"[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*value="';
	$s_pat .= preg_quote($s_value,"/");
	$s_pat .= '")([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$2 checked="checked" $3>',$s_buf);

		// handle name attribute first
	$s_pat  = '/(<\s*input[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '"[^>]*type="(?:radio|checkbox)"[^>]*value="';
	$s_pat .= preg_quote($s_value,"/");
	$s_pat .= '")([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$2 checked="checked" $3>',$s_buf);

	return ($s_buf);
}

	//
	// This function handles checkboxes as an array of values.
	//
function FixCheckboxes($s_name,$a_values,$s_buf)
{
	//global $aDebug;

		//
		// we search for:
		//	<input type="checkbox" name="thename" value="thevalue" ...
		// and change it to:
		//	<input type="checkbox" name="thename" value="thevalue" checked
		//
		// Note that the value attribute must appear *after* the
		// type and name attributes.
		//

		//
		// first strip any current checked attributes
		//
	//$aDebug[] = "FixCheckboxes: Name='$s_name'";

		// handle type attribute first
        // see <A HREF="fmbadhandler.php#PatternInfo">
	$s_pat  = '/(<\s*input[^>]*type="checkbox"[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '\[]"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

		// handle name attribute first
	$s_pat  = '/(<\s*input[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '\[]"[^>]*type="checkbox"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

	foreach ($a_values as $s_value)
	{
			// handle type attribute first
		$s_pat	= '/(<\s*input[^>]*type="checkbox"[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '\[\]"[^>]*value="';
		$s_pat .= preg_quote($s_value,"/");
		$s_pat .= '")([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$2 checked="checked"$3>',$s_buf);
		//$aDebug[] = "Name='$s_name', pat='$s_pat'";

			// handle name attribute first
		$s_pat	= '/(<\s*input[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '\[\]"[^>]*type="checkbox"[^>]*value="';
		$s_pat .= preg_quote($s_value,"/");
		$s_pat .= '")([^>]*?)(\s*\/\s*)?>';
		$s_pat .= '/ims';
		$s_buf = preg_replace($s_pat,'$1$2 checked="checked">',$s_buf);
	}
	return ($s_buf);
}

	//
	// This function handles selects.
	//
function FixSelect($s_name,$s_value,$s_buf)
{
		//
		// we search for:
		//	<select name="thename"...>
		//	<option value="thevalue">...</option>
		//	</select>
		//

	$s_pat  = '/(<\s*select[^>]*name="';
	$s_pat .= preg_quote($s_name,"/");
	$s_pat .= '".*?<\s*option[^>]*value="';
	$s_pat .= preg_quote($s_value,"/");
	$s_pat .= '"[^>]*)>';
	$s_pat .= '/ims';
	$s_repl = '$1 selected="selected">';
//	echo "<p>pat: ".htmlspecialchars($s_pat);
	$s_buf = preg_replace($s_pat,$s_repl,$s_buf);

	return ($s_buf);
}

	//
	// This function handles multiple selects.
	//
function FixMultiSelect($s_name,$a_values,$s_buf)
{
		//
		// we search for:
		//	<select name="thename"...>
		//	<option value="thevalue">...</option>
		//	</select>
		//

	foreach ($a_values as $s_value)
	{
		$s_pat	= '/(<\s*select[^>]*name="';
		$s_pat .= preg_quote($s_name,"/");
		$s_pat .= '\[\]".*?<\s*option[^>]*value="';
		$s_pat .= preg_quote($s_value,"/");
		$s_pat .= '"[^>]*)>';
		$s_pat .= '/ims';
		$s_repl = '$1 selected="selected">';
	//	echo "<p>pat: ".htmlspecialchars($s_pat);
		$s_buf = preg_replace($s_pat,$s_repl,$s_buf);
	}
	return ($s_buf);
}

	//
	// This function unchecks all checkboxes and select options.
	//
function UnCheckStuff($s_buf)
{
	global	$php_errormsg;

		//
		// we search for:
		//	<input type="checkbox" ... checked
		// and remove "checked" (checked="checked" is OK too)
		//
		// Note that the check attribute must appear *after* the
		// type attribute.
        // see <A HREF="fmbadhandler.php#PatternInfo">
		//

	$s_pat  = '/(<\s*input[^>]*type="checkbox"[^>]*?[^"\w])checked(="checked"|(?=[^"\w]))?([^>]*?)(\s*\/\s*)?>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$3$4>',$s_buf);

		//
		// we search for:
		//	<option... selected
		// and remove "selected" (selected="selected" is OK too)
        // see <A HREF="fmbadhandler.php#PatternInfo">
		//

	$s_pat  = '/(<\s*option[^>]*?[^"\w])selected(="selected"|(?=[^"\w]))?([^>]*)>';
	$s_pat .= '/ims';
	$s_buf = preg_replace($s_pat,'$1$3>',$s_buf);

	return ($s_buf);
}

	//
	// Add the user agent to the url as a parameter called USER_AGENT.
	// This allows dynamic web sites to know what the user's browser is.
	//
function AddUserAgent($s_url)
{
	global	$aServerVars;

		//
		// check for ? in the name
		//
	$b_quest = (strpos($s_url,'?') !== false);
	unset($s_agent);
	if (isset($aServerVars['HTTP_USER_AGENT']))
		$s_agent = $aServerVars['HTTP_USER_AGENT'];
	if (isset($s_agent))
		$s_url .= ($b_quest ? '&' : '?')."USER_AGENT=".urlencode($s_agent);
	return ($s_url);
}

    //
    // Sets previous values in a form.
    //
function SetPreviousValues($s_form_buf,$a_values)
{
	    //
	    // Uncheck any checkboxes and select options
	    //
    $s_form_buf = UnCheckStuff($s_form_buf);
    foreach ($a_values as $s_name=>$m_value)
    {
	    if (is_array($m_value))
	    {
			    //
			    // note that if no values are selected for a field,
			    // then we will never get here for that field
			    //
		    $s_form_buf = FixCheckboxes($s_name,$m_value,$s_form_buf);
		    $s_form_buf = FixMultiSelect($s_name,$m_value,$s_form_buf);
	    }
	    else
	    {
			    //
			    // Fix the field if it's an input type "text" or "password".
			    //
		    $s_form_buf = FixInputText($s_name,$m_value,$s_form_buf);
			    //
			    // Fix the field if it's radio button.
			    //
		    $s_form_buf = FixButton($s_name,$m_value,$s_form_buf);
			    //
			    // Fix the field if it's a "textarea".
			    //
		    $s_form_buf = FixTextArea($s_name,$m_value,$s_form_buf);
			    //
			    // Fix the field if it's a "select".
			    //
		    $s_form_buf = FixSelect($s_name,$m_value,$s_form_buf);
	    }
    }
    return ($s_form_buf);
}

    //
    // Open a URL, do value substitutions, and send to browser.
    //
function ProcessReturnToForm($s_url,$a_values)
{
	global	$aSubstituteErrors,$aSubstituteValues,$sSubstituteMissing;
    global  $php_errormsg;

		//
		// read the original form, and modify it to provide values
		// for the fields
		//
	if (!CheckValidURL($s_url))
		Error("invalid_url",GetMessage(MSG_RETURN_URL_INVALID,
                                    array("URL"=>$s_url)),false,false);

	$s_form_url = AddUserAgent($s_url);
    $s_error = "";
    $s_form_buf = GetURL($s_form_url,$s_error);
	if ($s_form_buf === false)
		Error("invalid_url",GetMessage(MSG_OPEN_URL,
                                array("URL"=>$s_form_url,
                                      "ERROR"=>$s_error.": ".(isset($php_errormsg) ?
                                            $php_errormsg : ""))),false,false);

    /*****
        This is not correct here, because this function is only called
        for non-template URLs.
        //
        // First, we do any "$var" substitutions
        //

		//
		// initialize the errors list
		//
	$aSubstituteErrors = array();
		//
		// initialize the values
		//
	$aSubstituteValues = $a_values;
	$sSubstituteMissing = $s_missing;

		//
		// search for words in this form:
		//		$word
		// where word begins with an alphabetic character and
		// consists of alphanumeric and underscore
		//
//    $s_form_buf = preg_replace_callback('/\$([a-z][a-z0-9_]*)/i',
//										'SubstituteValueForPage',$s_form_buf);

//	SendAlert("Error count=".count($aSubstituteErrors));
	if (count($aSubstituteErrors) != 0)
		Error("template_failed",
                    GetMessage(MSG_TEMPLATE_ERRORS,array("NAME"=>$s_template)).
							implode("\n",$aSubstituteErrors),false,false);
    ******/

        //
        // Next, we replace or set actual field values.
        //
    echo SetPreviousValues($s_form_buf,$a_values);
}

	//
	// To return the URL for returning to a particular multi-page form URL.
	//
function GetReturnLink($s_this_script,$i_form_index)
{
	if (!CheckValidURL($s_this_script))
        Error("not_valid_url",GetMessage(MSG_RETURN_URL_INVALID,
                                array("URL"=>$s_this_script)),false,false);

    $a_params = array();
    $a_params[] = "return=$i_form_index";
    if (isset($aServerVars["QUERY_STRING"]))
	    $a_params[] = $aServerVars["QUERY_STRING"];
    $a_params[] = session_name()."=".session_id();
    return (AddURLParams($s_this_script,$a_params));
}

    //
    // Process a multi-page form template.
    //
function ProcessMultiFormTemplate($s_template,$a_values,&$a_lines)
{
    global	$MULTIFORMURL,$MULTIFORMDIR,$SPECIAL_VALUES,$aSessionVars;

	if (empty($MULTIFORMDIR) && empty($MULTIFORMURL))
	{
		SendAlert(GetMessage(MSG_MULTIFORM));
		return (false);
	}
    $i_index = $aSessionVars["FormIndex"];
    $a_values["this_form_url"] = $aSessionVars["FormList"][$i_index]["URL"];
    //$a_values["prev_form"] = GetReturnLink($SPECIAL_VALUES["this_form"]);
    return (DoProcessTemplate($MULTIFORMDIR,$MULTIFORMURL,$s_template,$a_lines,
                            $a_values,"",'SubstituteValueForPage'));
}

	//
	// Output the multi-form template after filling in the fields.
	//
function OutputMultiFormTemplate($s_template,$a_values)
{
	$a_lines = array();
    if (!ProcessMultiFormTemplate($s_template,$a_values,$a_lines))
		Error("multi_form_failed",GetMessage(MSG_MULTIFORM_FAILED,
									array("NAME"=>$s_template)),false,false);
	else
    {
        $n_lines = count($a_lines);
        $s_buf = "";
        for ($ii = 0 ; $ii < $n_lines ; $ii++)
        {
            $s_buf .= $a_lines[$ii]."\n";
            unset($a_lines[$ii]);       // free memory (hopefully)
        }
        unset($a_lines);       // free memory (hopefully)

        global  $aSessionVars;

        if (isset($aSessionVars["FormKeep"]))
                //
                // put in any values that are being forward-remembered
                //
            echo SetPreviousValues($s_buf,$aSessionVars["FormKeep"]);
        else
            echo $s_buf;
    }
}

	//
	// Insert a preamble into a MIME message.
	//
function MimePreamble(&$a_lines,$a_mesg = array())
{
	$a_preamble = explode("\n",GetMessage(MSG_MIME_PREAMBLE));
	foreach ($a_preamble as $s_line)
		$a_lines[] = $s_line.HEAD_CRLF;

	$a_lines[] = HEAD_CRLF;		// blank line
	$b_need_blank = false;
	foreach ($a_mesg as $s_line)
	{
		$a_lines[] = $s_line.HEAD_CRLF;
		if (!empty($s_line))
			$b_need_blank = true;
	}
	if ($b_need_blank)
		$a_lines[] = HEAD_CRLF;		// blank line
}

	//
	// Create the HTML mail
	//
function HTMLMail(&$a_lines,&$a_headers,$s_body,$s_template,$s_missing,$s_filter,
							$s_boundary,$a_raw_fields,$b_no_plain)
{
	$s_charset = GetMailOption("CharSet");
	if (!isset($s_charset))
		$s_charset = "ISO-8859-1";
	if ($b_no_plain)
	{
		$b_multi = false;
			//
			// don't provide a plain text version - just the HTML
			//
		$a_headers['Content-Type'] = "text/html; charset=$s_charset";
	}
	else
	{
		$b_multi = true;
		$a_headers['Content-Type'] = "multipart/alternative; boundary=\"$s_boundary\"";

		$a_pre_lines = explode("\n",GetMessage(MSG_MIME_HTML,
												array("NAME"=>$s_template)));

		MimePreamble($a_lines,$a_pre_lines);

			//
			// first part - the text version only
			//
		$a_lines[] = "--$s_boundary".HEAD_CRLF;
		$a_lines[] = "Content-Type: text/plain; charset=$s_charset".HEAD_CRLF;
		$a_lines[] = HEAD_CRLF;		// blank line
			//
			// treat the body like one line, even though it isn't
			//
		$a_lines[] = $s_body;
		$a_lines[] = HEAD_CRLF;		// blank line
			//
			// second part - the HTML version
			//
		$a_lines[] = "--$s_boundary".HEAD_CRLF;
		$a_lines[] = "Content-Type: text/html; charset=$s_charset".HEAD_CRLF;
		$a_lines[] = HEAD_CRLF;		// blank line
	}

	$a_html_lines = array();
	if (!ProcessTemplate($s_template,$a_html_lines,$a_raw_fields,$s_missing))
		return (false);

	if (!empty($s_filter))
			//
			// treat the data like one line, even though it isn't
			//
		$a_lines[] = Filter($s_filter,$a_html_lines);
	else
		foreach ($a_html_lines as $s_line)
			$a_lines[] = $s_line;

	if ($b_multi)
	{
			//
			// end
			//
		$a_lines[] = "--$s_boundary--".HEAD_CRLF;
		$a_lines[] = HEAD_CRLF;		// blank line
	}
	return (true);
}

	//
	// Add the contents of a file in base64 encoding.
	//
function AddFile(&$a_lines,$s_file_name,$i_file_size,$b_remove = true)
{
	global	$php_errormsg;

@	$fp = fopen($s_file_name,"rb");
	if ($fp === false)
	{
		SendAlert(GetMessage(MSG_FILE_OPEN_ERROR,array("NAME"=>$s_file_name,
											"TYPE"=>"attachment",
											"ERROR"=>CheckString($php_errormsg))));
		return (false);
	}
		//
		// PHP under IIS has problems with the filesize function when
		// the file is on another drive.  So, we replaced a call
		// to filesize with the $i_file_size parameter (this occurred
		// in version 3.01).
		//
	$s_contents = fread($fp,$i_file_size);
		//
		// treat as a single line, even though it isn't
		//
	$a_lines[] = chunk_split(base64_encode($s_contents));
	fclose($fp);
    if ($b_remove)
        @unlink($s_file_name);
	return (true);
}

	//
	// Add the contents of a string in base64 encoding.
	//
function AddData(&$a_lines,$s_data)
{
		//
		// treat as a single line, even though it isn't
		//
	$a_lines[] = chunk_split(base64_encode($s_data));
	return (true);
}
    //
    // Check if a file is a valid uploaded file.
    //
function IsUploadedFile($a_file_spec)
{
        //
        // $a_file_spec['moved'] is our own internal flag to say we've
        // saved the file
        //
    if (isset($a_file_spec['moved']) && $a_file_spec['moved'])
        return (true);
    return (is_uploaded_file($a_file_spec['tmp_name']));
}

	//
	// Save an uploaded file to the repository directory.
	//
function SaveFileInRepository(&$a_file_spec)
{
    global  $php_errormsg,$FILE_REPOSITORY;

        //
        // if a replacement name has been specified, use that, otherwise
        // use the original name
        //
    if (isset($a_file_spec['new_name']))
	    $s_file_name = basename($a_file_spec['new_name']);
    else
	    $s_file_name = basename($a_file_spec['name']);
    $s_dest = $FILE_REPOSITORY."/".$s_file_name;

    $b_ok = true;
    $s_error = "";

    if (isset($a_file_spec['saved_as']) && !empty($a_file_spec['saved_as']))
        $s_srce = $a_file_spec['saved_as'];
    else
        $s_srce = $a_file_spec['tmp_name'];

    if (!FILE_OVERWRITE)
    {
        clearstatcache();
        if (@file_exists($s_dest))
        {
            $b_ok = false;
            $s_error = GetMessage(MSG_SAVE_FILE_EXISTS,array("FILE"=>$s_dest));
        }
    }
    if (MAX_FILE_UPLOAD_SIZE != 0 &&
        $a_file_spec['size'] > MAX_FILE_UPLOAD_SIZE*1024)
            //
            // this exits
            //
        UserError("upload_size",GetMessage(MSG_FILE_UPLOAD_SIZE,
                                  array("NAME"=>$a_file_spec['name'],
                                        "SIZE"=>$a_file_spec['size'],
                                        "MAX"=>MAX_FILE_UPLOAD_SIZE)));
    if ($b_ok)
    {
        if (isset($a_file_spec['saved_as']) && !empty($a_file_spec['saved_as']))
        {
            if (!copy($s_srce,$s_dest) || !@unlink($s_srce))
                $b_ok = false;
        }
        else
        {
            if (!move_uploaded_file($s_srce,$s_dest))
                $b_ok = false;
        }
        if ($b_ok)
        {
                //
                // Flag to say it's been put in the repository.
                //
            $a_file_spec['in_repository'] = true;
                //
                // Its new location
                //
            $a_file_spec['saved_as'] = $s_dest;
                //
                // Now that the file has been saved, "is_uploaded_file"
                // will return false.  So, we create a flag to say it was
                // valid.
                //
            $a_file_spec['moved'] = true;
        }
        else
            $s_error = $php_errormsg;
    }
    if (!$b_ok)
    {
		SendAlert(GetMessage(MSG_SAVE_FILE,array(
                            "FILE"=>$s_srce,
                            "DEST"=>$s_dest,
                            "ERR"=>$s_error)));
        return (false);
    }
        //
        // ignore chmod fails (other than reporting them)
        //
    if (FILE_MODE != 0 && !chmod($s_dest,FILE_MODE))
		SendAlert(GetMessage(MSG_CHMOD,array(
                            "FILE"=>$s_dest,
                            "MODE"=>FILE_MODE,
                            "ERR"=>$s_error)));
    return (true);
}

	//
	// Save all uploaded files to the repository directory.
	//
function SaveAllFilesToRepository()
{
    global  $aFileVars;

    if (!FILEUPLOADS || $FILE_REPOSITORY === "")
            //
            // nothing to do
            //
        return (true);

	foreach ($aFileVars as $m_file_key=>$a_upload)
	{
            //
            // One customer reported:
            //  Possible file upload attack detected: name='' temp name='none'
            // on PHP 4.1.2 on RAQ4.
            // So, we now also test for 'name'.
            //
		if (!isset($a_upload['tmp_name']) || empty($a_upload['tmp_name']) ||
            !isset($a_upload['name']) || empty($a_upload['name']))
			continue;
        if (isset($a_upload['in_repository']) && $a_upload['in_repository'])
                //
                // already saved
                //
            continue;
		if (!IsUploadedFile($a_upload))
		{
			SendAlert(GetMessage(MSG_FILE_UPLOAD_ATTACK,
							array("NAME"=>$a_upload['name'],
									"TEMP"=>$a_upload['tmp_name'],
                                    "FLD"=>$m_file_key)));
			continue;
		}
        if (!SaveFileInRepository($aFileVars[$m_file_key]))
			return (false);
	}
    return (true);
}

	//
	// Save an uploaded file for later processing.
	//
function SaveUploadedFile(&$a_file_spec,$s_prefix)
{
    global  $php_errormsg;

    $s_dest = GetScratchPadFile($s_prefix);
    if (!move_uploaded_file($a_file_spec['tmp_name'],$s_dest))
    {
		SendAlert(GetMessage(MSG_SAVE_FILE,array(
                            "FILE"=>$a_file_spec['tmp_name'],
                            "DEST"=>$s_dest,
                            "ERR"=>$php_errormsg)));
        return (false);
    }
    $a_file_spec['saved_as'] = $s_dest;
    $a_file_spec['moved'] = true;
    return (true);
}

    //
    // Remove old files from the scratchpad directory.
    //
function CleanScratchPad($s_prefix = "")
{
    global  $lNow,$CLEANUP_TIME,$CLEANUP_CHANCE;
    global  $php_errormsg,$SCRATCH_PAD;

	if (!isset($SCRATCH_PAD) || empty($SCRATCH_PAD))
            //
            // no scratchpad to cleanup!
            //
        return;
    if ($CLEANUP_TIME <= 0)
            //
            // cleanup disabled
            //
        return;
        //
        // compute chance of cleanup
        //
    if ($CLEANUP_CHANCE < 100)
    {
        $i_rand = mt_rand(1,100);
        if ($i_rand > $CLEANUP_CHANCE)
            return;
    }
    if (($f_dir = @opendir($SCRATCH_PAD)) === false)
    {
        Error("open_scratch_pad",GetMessage(MSG_OPEN_SCRATCH_PAD,array(
                                        "DIR"=>$SCRATCH_PAD,
                                        "ERR"=>$php_errormsg)),false,false);
        return;
    }
    $i_len = strlen($s_prefix);
    while (($s_file = readdir($f_dir)) !== false)
    {
        $s_path = $SCRATCH_PAD."/".$s_file;
        if (is_file($s_path) && ($i_len == 0 || substr($s_file,0,$i_len) == $s_prefix))
        {
            if (($a_stat = @stat($s_path)) !== false)
            {
                if (isset($a_stat['mtime']))
                    $l_time = $a_stat['mtime'];
                else
                    $l_time = $a_stat[9];
                if (($lNow - $l_time) / 60 >= $CLEANUP_TIME)
                    @unlink($s_path);
            }
        }
    }
    closedir($f_dir);
}

	//
	// Save all uploaded files for later processing.
	//
function SaveAllUploadedFiles(&$a_file_vars)
{
    global  $php_errormsg,$SCRATCH_PAD;

    $s_prefix = "UPLD";
	if (!isset($SCRATCH_PAD) || empty($SCRATCH_PAD))
    {
        Error("need_scratch_pad",GetMessage(MSG_NEED_SCRATCH_PAD),false,false);
        return (false);
    }

        //
        // remove old uploaded files that have not been moved out.
        //
    CleanScratchPad($s_prefix);

    foreach (array_keys($a_file_vars) as $m_file_key)
    {
        $a_upload = &$a_file_vars[$m_file_key];
            //
            // One customer reported:
            //  Possible file upload attack detected: name='' temp name='none'
            // on PHP 4.1.2 on RAQ4.
            // So, we now also test for 'name'.
            //
		if (!isset($a_upload['tmp_name']) || empty($a_upload['tmp_name']) ||
            !isset($a_upload['name']) || empty($a_upload['name']))
			continue;
            //
            // ensure we don't move the file more than once
            //
        if (!isset($a_upload['saved_as']) || empty($a_upload['saved_as']))
            if (!IsUploadedFile($a_upload))
				SendAlert(GetMessage(MSG_FILE_UPLOAD_ATTACK,
								array("NAME"=>$a_upload['name'],
									    "TEMP"=>$a_upload['tmp_name'],
                                        "FLD"=>$m_file_key)));
            elseif (!SaveUploadedFile($a_upload,$s_prefix))
                return (false);
    }
    return (true);
}

	//
	// Attach a file to the body of a MIME formatted email.  $a_lines is the
	// current body, and is modified to include the file.
	// $a_file_spec must have the following values (just like an uploaded
	// file specification):
	//		name		the name of the file
	//		type		the mime type
	//		tmp_name	the name of the temporary file
	//		size		the size of the temporary file
	//
	// Alternatively, you supply the following instead of tmp_name and size:
	//		data		the data to attach
	//
function AttachFile(&$a_lines,$s_att_boundary,$a_file_spec,$s_charset)
{
	$a_lines[] = "--$s_att_boundary".HEAD_CRLF;
        //
        // if a replacement name has been specified, use that, otherwise
        // use the original name
        //
    if (isset($a_file_spec['new_name']))
	    $s_file_name = $a_file_spec['new_name'];
	else
        $s_file_name = $a_file_spec['name'];
	$s_file_name = str_replace('"','',$s_file_name);
	$s_mime_type = $a_file_spec['type'];
			//
			// The following says that the data is encoded in
			// base64 and is an attachment and that once decoded the
			// character set of the decoded data is $s_charset.
			// (See RFC 1521 Section 5.)
			//
	$a_lines[] = "Content-Type: $s_mime_type; name=\"$s_file_name\"; charset=$s_charset".HEAD_CRLF;
	$a_lines[] = "Content-Transfer-Encoding: base64".HEAD_CRLF;
	$a_lines[] = "Content-Disposition: attachment; filename=\"$s_file_name\"".HEAD_CRLF;
	$a_lines[] = HEAD_CRLF;			// blank line
	if (isset($a_file_spec['tmp_name']) && isset($a_file_spec['size']))
    {
        $s_srce = $a_file_spec['tmp_name'];
            //
            // check if the file has been saved elsewhere
            //
        if (isset($a_file_spec['saved_as']) && !empty($a_file_spec['saved_as']))
            $s_srce = $a_file_spec['saved_as'];
		return (AddFile($a_lines,$s_srce,$a_file_spec['size']));
    }
	if (!isset($a_file_spec['data']))
	{
		SendAlert(GetMessage(MSG_ATTACH_DATA));
		return (false);
	}
	return (AddData($a_lines,$a_file_spec['data']));
}

	//
	// Reformat the email to be in MIME format.
	// Process file attachments and and fill out any
	// specified HTML template.
	//
function MakeMimeMail(&$s_body,&$a_headers,$a_raw_fields,$s_template = "",
					$s_missing = NULL,$b_no_plain = false,
					$s_filter = "",$a_file_vars = array(),
					$a_attach_spec = array())
{
	global	$FM_VERS,$aPHPVERSION;
    global  $SPECIAL_VALUES,$FILTER_ATTRIBS,$FILE_REPOSITORY;

	$s_charset = GetMailOption("CharSet");
	if (!isset($s_charset))
		$s_charset = "ISO-8859-1";
	$b_att = $b_html = false;
	$b_got_filter = (isset($s_filter) && !empty($s_filter));
	if (isset($s_template) && !empty($s_template))
	{
			//
			// need PHP 4.0.5 for the preg_replace_callback function
			//
		if (!IsPHPAtLeast("4.0.5"))
		{
			SendAlert(GetMessage(MSG_PHP_HTML_TEMPLATES,
							array("PHPVERS"=>implode(".",$aPHPVERSION))));
			return (false);
		}
		$b_html = true;
	}
	if (count($a_file_vars) > 0)
	{
		if (!IsPHPAtLeast("4.0.3"))
		{
			SendAlert(GetMessage(MSG_PHP_FILE_UPLOADS,
							array("PHPVERS"=>implode(".",$aPHPVERSION))));
			return (false);
		}
		if (!FILEUPLOADS)
			SendAlert(GetMessage(MSG_FILE_UPLOAD));
		elseif ($FILE_REPOSITORY === "")    // if storing on the server, don't attach
			foreach ($a_file_vars as $a_upload)
			{
                    //
                    // One customer reported:
                    //  Possible file upload attack detected: name='' temp name='none'
                    // on PHP 4.1.2 on RAQ4.
                    // So, we now also test for 'name'.
                    //
				if (isset($a_upload['tmp_name']) && !empty($a_upload['tmp_name']) &&
                    isset($a_upload['name']) && !empty($a_upload['name']))
				{
					$b_att = true;
					break;
				}
			}
	}
		//
		// check for an internally-generated attachment
		//
	if (isset($a_attach_spec["Data"]))
		$b_att = true;

	$s_uniq = md5($s_body);
	$s_body_boundary = "BODY$s_uniq";
	$s_att_boundary = "PART$s_uniq";
	$a_headers['MIME-Version'] = "1.0 (produced by FormMail $FM_VERS from www.tectite.com)";

		//
		// if the filter strips formatting, then we'll only have plain text
		// to send, even after the template has been used
		//
	if ($b_got_filter && IsFilterAttribSet($s_filter,"Strips"))
			//
			// no HTML if the filter strips the formatting
			//
		$b_html = false;
	$a_new = array();
	if ($b_att)
	{
		$a_headers['Content-Type'] = "multipart/mixed; boundary=\"$s_att_boundary\"";

		MimePreamble($a_new);
			//
			// add the body of the email
			//
		$a_new[] = "--$s_att_boundary".HEAD_CRLF;
		if ($b_html)
		{
			$a_lines = $a_local_headers = array();
			if (!HTMLMail($a_lines,$a_local_headers,$s_body,$s_template,
							$s_missing,($b_got_filter) ? $s_filter : "",
							$s_body_boundary,$a_raw_fields,$b_no_plain))
				return (false);
			$a_new = array_merge($a_new,ExpandMailHeadersArray($a_local_headers));
			$a_new[] = HEAD_CRLF;		// blank line after header
			$a_new = array_merge($a_new,$a_lines);
		}
		else
		{
			$a_new[] = "Content-Type: text/plain; charset=$s_charset".HEAD_CRLF;
			$a_new[] = HEAD_CRLF;		// blank line
				//
				// treat the body like one line, even though it isn't
				//
			$a_new[] = $s_body;
		}
			//
			// now add the attachments or save to the $FILE_REPOSITORY
			//
		if (FILEUPLOADS && $FILE_REPOSITORY === "")
			foreach ($a_file_vars as $m_file_key=>$a_upload)
			{
                    //
                    // One customer reported:
                    //  Possible file upload attack detected: name='' temp name='none'
                    // on PHP 4.1.2 on RAQ4.
                    // So, we now also test for 'name'.
                    //
				if (!isset($a_upload['tmp_name']) || empty($a_upload['tmp_name']) ||
                    !isset($a_upload['name']) || empty($a_upload['name']))
					continue;
				if (!IsUploadedFile($a_upload))
				{
					SendAlert(GetMessage(MSG_FILE_UPLOAD_ATTACK,
									array("NAME"=>$a_upload['name'],
										  "TEMP"=>$a_upload['tmp_name'],
                                          "FLD"=>$m_file_key)));
					continue;
				}
                if (MAX_FILE_UPLOAD_SIZE != 0 &&
                    $a_upload['size'] > MAX_FILE_UPLOAD_SIZE*1024)
                    UserError("upload_size",GetMessage(MSG_FILE_UPLOAD_SIZE,
                                              array("NAME"=>$a_upload['name'],
                                                    "SIZE"=>$a_upload['size'],
                                                    "MAX"=>MAX_FILE_UPLOAD_SIZE)));
                if (!AttachFile($a_new,$s_att_boundary,$a_upload,$s_charset))
					return (false);
			}
		if (isset($a_attach_spec["Data"]))
		{
				//
				// build a specification similar to a file upload
				//
			$a_file_spec["name"] = isset($a_attach_spec["Name"]) ?
										$a_attach_spec["Name"] :
										"attachment.dat";
			$a_file_spec["type"] = isset($a_attach_spec["MIME"]) ?
										$a_attach_spec["MIME"] :
										"text/plain";
			$a_file_spec["data"] = $a_attach_spec["Data"];
			if (!AttachFile($a_new,$s_att_boundary,$a_file_spec,
								isset($a_attach_spec["CharSet"]) ?
								$a_attach_spec["CharSet"] :
								$s_charset))
				return (false);
		}
		$a_new[] = "--$s_att_boundary--".HEAD_CRLF;		// the end
		$a_new[] = HEAD_CRLF;			// blank line
	}
	elseif ($b_html)
	{
		if (!HTMLMail($a_new,$a_headers,$s_body,$s_template,
							$s_missing,($b_got_filter) ? $s_filter : "",
							$s_body_boundary,$a_raw_fields,$b_no_plain))
			return (false);
	}
	else
	{
		$a_headers['Content-Type'] = "text/plain; charset=$s_charset";
			//
			// treat the body like one line, even though it isn't
			//
		$a_new[] = $s_body;
	}

	$s_body = JoinLines(BODY_LF,$a_new);
	return (true);
}

	//
	// to make a From line for the email
	//
function MakeFromLine($s_email,$s_name)
{
	$s_line = "";
	if (!empty($s_email))
		$s_line .= $s_email." ";
	if (!empty($s_name))
		$s_line .= "(".$s_name.")";
	return ($s_line);
}

	//
	// Return two sets of plain text output: the filtered fields and the
	// non-filtered fields.
	//
function GetFilteredOutput($a_fld_order,$a_clean_fields,$s_filter,$a_filter_list)
{
		//
		// find the non-filtered fields and make unfiltered text from them
		//
	$a_unfiltered_list = array();
	$n_flds = count($a_fld_order);
	for ($ii = 0 ; $ii < $n_flds ; $ii++)
		if (!in_array($a_fld_order[$ii],$a_filter_list))
			$a_unfiltered_list[] = $a_fld_order[$ii];
	$s_unfiltered_results = MakeFieldOutput($a_unfiltered_list,$a_clean_fields);
		//
		// filter the specified fields only
		//
	$s_filtered_results = MakeFieldOutput($a_filter_list,$a_clean_fields);
	$s_filtered_results = Filter($s_filter,$s_filtered_results);
	return (array($s_unfiltered_results,$s_filtered_results));
}

	//
	// Make a plain text email body
	//
function MakePlainEmail($a_fld_order,$a_clean_fields,
						$s_to,$s_cc,$s_bcc,$a_raw_fields,$s_filter,$a_filter_list)
{
    global  $SPECIAL_VALUES,$aPHPVERSION;

	$s_unfiltered_results = $s_filtered_results = "";
	$b_got_filter = (isset($s_filter) && !empty($s_filter));
	if ($b_got_filter)
		if (isset($a_filter_list) && count($a_filter_list) > 0)
			$b_limited_filter = true;
		else
			$b_limited_filter = false;
	$b_used_template = false;
	if (IsMailOptionSet("PlainTemplate"))
	{
			//
			// need PHP 4.0.5 for the preg_replace_callback function
			//
		if (!IsPHPAtLeast("4.0.5"))
			SendAlert(GetMessage(MSG_PHP_PLAIN_TEMPLATES,
							array("PHPVERS"=>implode(".",$aPHPVERSION))));
		else
		{
			$s_template = GetMailOption("PlainTemplate");
			if (ProcessTemplate($s_template,$a_lines,$a_raw_fields,
								GetMailOption('TemplateMissing'),
								'SubstituteValuePlain'))
			{
				$b_used_template = true;
				$s_unfiltered_results = implode(BODY_LF,$a_lines);
				if ($b_got_filter)
				{
						//
						// with a limited filter, the template goes unfiltered
						// and the named fields get filtered
						//
					if ($b_limited_filter)
						list($s_discard,$s_filtered_results) =
									GetFilteredOutput($a_fld_order,$a_clean_fields,
											$s_filter,$a_filter_list);
					else
					{
						$s_filtered_results = Filter($s_filter,$s_unfiltered_results);
						$s_unfiltered_results = "";
					}
				}
			}
		}
	}
	if (!$b_used_template)
	{
		$res_hdr = "";

		if (IsMailOptionSet("DupHeader"))
		{
				//
				// write some standard mail headers
				//
			$res_hdr = "To: $s_to".BODY_LF;
			if (!empty($s_cc))
				$res_hdr .= "Cc: $s_cc".BODY_LF;
			if (!empty($SPECIAL_VALUES["email"]))
				$res_hdr .= MakeFromLine($SPECIAL_VALUES["email"],
										$SPECIAL_VALUES["realname"]);
			$res_hdr .= BODY_LF;
			if (IsMailOptionSet("StartLine"))
				$res_hdr .= "--START--".BODY_LF;		// signals the beginning of the text to filter
		}

			//
			// put the realname and the email address at the top of the results
			// (if not excluded)
			//
		if (!IsMailExcluded("realname"))
		{
			array_unshift($a_fld_order,"realname");
			$a_clean_fields["realname"] = $SPECIAL_VALUES["realname"];
		}
		if (!IsMailExcluded("email"))
		{
			array_unshift($a_fld_order,"email");
			$a_clean_fields["email"] = $SPECIAL_VALUES["email"];
		}
		if ($b_got_filter)
		{
			if ($b_limited_filter)
				list($s_unfiltered_results,$s_filtered_results) =
							GetFilteredOutput($a_fld_order,$a_clean_fields,
									$s_filter,$a_filter_list);
			else
			{
					//
					// make text output and filter it (filter all fields)
					//
				$s_filtered_results = MakeFieldOutput($a_fld_order,$a_clean_fields);
				$s_filtered_results = Filter($s_filter,$s_filtered_results);
			}
		}
		else
		{
//SendAlert("There are ".count($a_fld_order)." fields in the order array");
//SendAlert("Here is the clean fields array:\r\n".var_export($a_clean_fields,true));
			$s_unfiltered_results = MakeFieldOutput($a_fld_order,$a_clean_fields);
		}
		$s_unfiltered_results = $res_hdr.$s_unfiltered_results;
	}
	$s_results = $s_unfiltered_results;
	if ($b_got_filter && !empty($s_filtered_results))
	{
		if (!empty($s_results))
			$s_results .= BODY_LF;
		$s_results .= $s_filtered_results;
	}
	return (array($s_results,$s_unfiltered_results,$s_filtered_results));
}

    //
    // send the given results to the given email addresses
    //
function SendResults($a_fld_order,$a_clean_fields,$s_to,$s_cc,$s_bcc,$a_raw_fields)
{
    global  $SPECIAL_VALUES,$aFileVars,$FILE_REPOSITORY;

		//
		// check for a filter and how to use it
		//
	$b_got_filter = (isset($SPECIAL_VALUES["filter"]) && !empty($SPECIAL_VALUES["filter"]));
	$b_filter_attach = false;
	$a_attach_spec = array();
	$s_filter = "";
	$a_filter_list = array();
	if ($b_got_filter)
	{
		$s_filter = $SPECIAL_VALUES["filter"];
		if (isset($SPECIAL_VALUES["filter_fields"]) && !empty($SPECIAL_VALUES["filter_fields"]))
		{
			$b_limited_filter = true;
			$a_filter_list = TrimArray(explode(",",$SPECIAL_VALUES["filter_fields"]));
		}
		else
			$b_limited_filter = false;
		$s_filter_attach_name = GetFilterOption("Attach");
		if (isset($s_filter_attach_name))
			 if (!is_string($s_filter_attach_name) || empty($s_filter_attach_name))
				SendAlert(GetMessage(MSG_ATTACH_NAME));
			else
			{
				$b_filter_attach = true;
				$a_attach_spec = array("Name"=>$s_filter_attach_name);
				if (($s_mime = GetFilterAttrib($s_filter,"MIME")) !== false)
					$a_attach_spec["MIME"] = $s_mime;
					//
					// Regarding the character set...
					// A filter will not generally change the character set
					// of the message, however, if it does, then we
					// provide that information to the MIME encoder.
					// Remember: this character set specification refers
					// to the data *after* the effect of the filter
					// has been reversed (e.g. an encrypted message
					// in UTF-8 is in UTF-8 when it is decrypted).
					//
				if (($s_cset = GetFilterAttrib($s_filter,"CharSet")) !== false)
					$a_attach_spec["CharSet"] = $s_cset;
			}
	}

		//
		// check the need for MIME formatted mail
		//
	$b_mime_mail = (IsMailOptionSet("HTMLTemplate") || count($aFileVars) > 0 ||
					$b_filter_attach);

		//
		// create the email header lines - CC, BCC, and From
		//
	$a_headers = array();
	if (!empty($s_cc))
		$a_headers['Cc'] = $s_cc;
		//
		// note that BCC is documented to not work prior to PHP 4.3
		//
	if (!empty($s_bcc))
	{
		global	$aPHPVERSION;

		if ($aPHPVERSION[0] < 4 || ($aPHPVERSION[0] == 4 && $aPHPVERSION[1] < 3))
			SendAlert(GetMessage(MSG_PHP_BCC,
							array("PHPVERS"=>implode(".",$aPHPVERSION))));
		$a_headers['Bcc'] = $s_bcc;
	}
		//
		// create the From address
		//
		// Some servers won't let you set the email address to the
		// submitter of the form.  Therefore, use FromAddr if it's been
		// specified.  If it's empty, don't specify a sender.
		//
	$s_sender = GetMailOption("FromAddr");
	if (!isset($s_sender))
	{
		$s_sender = "";
		if (!empty($SPECIAL_VALUES["email"]))
			$a_headers['From'] = MakeFromLine($SPECIAL_VALUES["email"],
											$SPECIAL_VALUES["realname"]);
	}
	elseif ($s_sender !== "")
		$s_sender = $a_headers['From'] = UnMangle($s_sender);

    if ($s_sender === "")
        if (SET_SENDER_FROM_EMAIL)
            $s_sender = $SPECIAL_VALUES["email"];

		//
		// special case: if there is only one non-special string value, then
		// format it as an email (unless an option says not to)
		//
	$a_keys = array_keys($a_raw_fields);
	if (count($a_keys) == 1 && is_string($a_raw_fields[$a_keys[0]]) &&
		!IsMailOptionSet("AlwaysList") && !IsMailOptionSet("DupHeader"))
	{
		if (IsMailExcluded($a_keys[0]))
			SendAlert("Exclusion of single field '".$a_keys[0]."' ignored");
		$s_value = $a_raw_fields[$a_keys[0]];
			//
			// replace carriage return/linefeeds with <br>
			//
		$s_value = str_replace("\r\n",'<br />',$s_value);
			//
			// replace lone linefeeds with <br>
			//
		$s_value = str_replace("\n",'<br />',$s_value);
			//
			// remove lone carriage returns
			//
		$s_value = str_replace("\r","",$s_value);
			//
			// replace all control chars with <br>
			//
		$s_value = preg_replace('/[[:cntrl:]]+/','<br />',$s_value);
			//
			// strip HTML (note that all the <br> above will now be
			// replaced with BODY_LF)
			//
		$s_value = StripHTML($s_value,BODY_LF);

		if ($b_mime_mail)
		{
			if ($b_got_filter)
			{
					//
					// filter the whole value (ignore filter_fields for this
					// special case) if a filter has been specified
					//
				$s_results = Filter($s_filter,$s_value);
				if ($b_filter_attach)
				{
					$a_attach_spec["Data"] = $s_results;
                        //
                        // KeepInLine keeps the filtered version inline as well
                        // as an attachment
                        //
                    if (!IsFilterOptionSet("KeepInLine"))
					    $s_results = "";
				    $s_filter = "";	// no more filtering
				}
			}
			else
				$s_results = $s_value;

				//
				// send this single value off to get formatted in a MIME
				// email
				//
			if (!MakeMimeMail($s_results,$a_headers,$a_raw_fields,
								GetMailOption('HTMLTemplate'),
								GetMailOption('TemplateMissing'),
								IsMailOptionSet("NoPlain"),
								$s_filter,$aFileVars,$a_attach_spec))
				return (false);
		}
		elseif ($b_got_filter)
			//
			// filter the whole value (ignore filter_fields for this special case)
			// if a filter has been specified
			//
			$s_results = Filter($s_filter,$s_value);
		else
			$s_results = $s_value;
	}
	else
	{
		if ($b_mime_mail)
		{
				//
				// get the plain text version of the email then send it
				// to get MIME formatted
				//
			list($s_results,$s_unfiltered_results,$s_filtered_results) =
							MakePlainEmail($a_fld_order,$a_clean_fields,
								$s_to,$s_cc,$s_bcc,$a_raw_fields,$s_filter,
								$a_filter_list);
			if ($b_filter_attach)
			{
					//
					// attached the filtered results
					//
				$a_attach_spec["Data"] = $s_filtered_results;
                    //
                    // KeepInLine keeps the filtered version inline as well
                    // as an attachment
                    //
                if (!IsFilterOptionSet("KeepInLine"))
					    //
					    // put the unfiltered results in the body of the message
					    //
				    $s_results = $s_unfiltered_results;
			    $s_filter = "";	// no more filtering
			}
			if (!MakeMimeMail($s_results,$a_headers,$a_raw_fields,
								GetMailOption('HTMLTemplate'),
								GetMailOption('TemplateMissing'),
								IsMailOptionSet("NoPlain"),
								$s_filter,$aFileVars,$a_attach_spec))
				return (false);
		}
		else
		{
			list($s_results,$s_unfiltered_results,$s_filtered_results) =
							MakePlainEmail($a_fld_order,$a_clean_fields,
								$s_to,$s_cc,$s_bcc,$a_raw_fields,$s_filter,
								$a_filter_list);
			if (!$b_got_filter && IsMailOptionSet("CharSet"))
					//
					// sending plain text email, and the CharSet has been
					// specified; include a header
					//
				$a_headers['Content-Type'] = "text/plain; charset=".GetMailOption("CharSet");
		}
	}

		//
		// append the environment variables report
		//
	if (isset($SPECIAL_VALUES["env_report"]))
	{
		$s_results .= BODY_LF."==================================".BODY_LF;
		$s_results .= BODY_LF.GetEnvVars(TrimArray(explode(",",$SPECIAL_VALUES["env_report"])),BODY_LF);
	}
        //
        // now save uploaded files to the repository
        //
    if (FILEUPLOADS && $FILE_REPOSITORY !== "")
        if (!SaveAllFilesToRepository())
            return (false);

		//
		// send the mail - assumes the email addresses have already been checked
		//
    return (SendCheckedMail($s_to,$SPECIAL_VALUES["subject"],$s_results,
									$s_sender,$a_headers));
}

    //
    // append an entry to a log file
    //
function WriteLog($log_file)
{
    global  $SPECIAL_VALUES,$php_errormsg;

@	$log_fp = fopen($log_file,"a");
	if ($log_fp === false)
	{
		SendAlert(GetMessage(MSG_FILE_OPEN_ERROR,array("NAME"=>$log_file,
											"TYPE"=>"log",
											"ERROR"=>CheckString($php_errormsg))));
		return;
	}
	$date = gmdate("H:i:s d-M-y T");
	$entry = $date.":".$SPECIAL_VALUES["email"].",".
			$SPECIAL_VALUES["realname"].",".$SPECIAL_VALUES["subject"]."\n";
	fwrite($log_fp,$entry);
	fclose($log_fp);
}

	//
	// write the data to a comma-separated-values file
	//
function WriteCSVFile($s_csv_file,$a_vars)
{
    global  $SPECIAL_VALUES,$CSVSEP,$CSVINTSEP,$CSVQUOTE,$CSVOPEN,$CSVLINE;

		//
		// create an array of column values in the order specified
		// in $SPECIAL_VALUES["csvcolumns"]
		//
	$a_column_list = $SPECIAL_VALUES["csvcolumns"];
	if (!isset($a_column_list) || empty($a_column_list) || !is_string($a_column_list))
	{
		SendAlert(GetMessage(MSG_CSVCOLUMNS,array("VALUE"=>$a_column_list)));
		return;
	}
	if (!isset($s_csv_file) || empty($s_csv_file) || !is_string($s_csv_file))
	{
		SendAlert(GetMessage(MSG_CSVFILE,array("VALUE"=>$s_csv_file)));
		return;
	}

@	$fp = fopen($s_csv_file,"a".$CSVOPEN);
	if ($fp === false)
	{
		SendAlert(GetMessage(MSG_FILE_OPEN_ERROR,array("NAME"=>$s_csv_file,
											"TYPE"=>"CSV",
											"ERROR"=>CheckString($php_errormsg))));
		return;
	}

		//
		// convert the column list to an array, trim the names too
		//
	$a_column_list = TrimArray(explode(",",$a_column_list));
	$n_columns = count($a_column_list);

		//
		// if the file is currently empty, put the column names in the first line
		//
	if (filesize($s_csv_file) == 0)
	{
		for ($ii = 0 ; $ii < $n_columns ; $ii++)
		{
			fwrite($fp,$CSVQUOTE.$a_column_list[$ii].$CSVQUOTE);
			if ($ii < $n_columns-1)
				fwrite($fp,"$CSVSEP");
		}
		fwrite($fp,$CSVLINE);
	}

//	$debug = "";
//	$debug .= "gpc -> ".get_magic_quotes_gpc()."\n";
//	$debug .= "runtime -> ".get_magic_quotes_runtime()."\n";
	for ($ii = 0 ; $ii < $n_columns ; $ii++)
	{
		$s_col_name = $a_column_list[$ii];
			//
			// columns can be missing from some form submission and present
			// from others
			//
		if (isset($a_vars[$s_col_name]))
			$m_value = $a_vars[$s_col_name];
		else
			$m_value = "";

		if (LIMITED_IMPORT)
				//
				// the target database doesn't understand escapes, so
				// remove various things, including newlines and truncate
				//
			$m_value = CleanValue($m_value,false);
		else
				//
				// the target database does understand escapes, so
				// we have to slash any slashes
				//
			$m_value = str_replace("\\","\\\\",$m_value);
			//
			// convert quotes, depending on the setting of $CSVQUOTE
			//
		switch ($CSVQUOTE)
		{
		case '"':
					//
					// convert double quotes in the data to single quotes
					//
			$m_value = str_replace("\"","'",$m_value);
			break;
		case '\'':
					//
					// convert single quotes in the data to double quotes
					//
			$m_value = str_replace("'","\"",$m_value);
			break;
		default:
				//
				// otherwise, leave the data unchanged
				//
			break;
		}
			//
			// we handle arrays and strings
			//
		if (is_array($m_value))
				//
				// separate the values with the internal field separator
				//
			$m_value = implode("$CSVINTSEP",$m_value);

//		$debug .= $a_column_list[$ii]." => ".$m_value."\n";
		fwrite($fp,$CSVQUOTE.$m_value.$CSVQUOTE);
		if ($ii < $n_columns-1)
			fwrite($fp,"$CSVSEP");
	}
	fwrite($fp,$CSVLINE);
	fclose($fp);
//	CreatePage($debug);
//	exit;
}

function CheckConfig()
{
	global	$TARGET_EMAIL,$CONFIG_CHECK;

	$a_mesgs = array();
	if (in_array("TARGET_EMAIL",$CONFIG_CHECK))
	{
			//
			// $TARGET_EMAIL values should begin with ^ and end with $
			//
		for ($ii = 0 ; $ii < count($TARGET_EMAIL) ; $ii++)
		{
			$s_pattern = $TARGET_EMAIL[$ii];
			if (substr($s_pattern,0,1) != '^')
				$a_mesgs[] = GetMessage(MSG_TARG_EMAIL_PAT_START,
										array("PAT"=>$s_pattern));
			if (substr($s_pattern,-1) != '$')
				$a_mesgs[] = GetMessage(MSG_TARG_EMAIL_PAT_END,
										array("PAT"=>$s_pattern));
		}
	}
	if (count($a_mesgs) > 0)
		SendAlert(GetMessage(MSG_CONFIG_WARN,
						array("MESGS"=>implode("\n",$a_mesgs))),false,true);
}

    //
    // append an entry to the Auto Responder log file
    //
function WriteARLog($s_to,$s_subj,$s_info)
{
	global	$LOGDIR,$AUTORESPONDLOG,$aServerVars,$php_errormsg;

	if (!isset($LOGDIR) || !isset($AUTORESPONDLOG) ||
			empty($LOGDIR) || empty($AUTORESPONDLOG))
		return;

	$log_file = $LOGDIR."/".$AUTORESPONDLOG;
@	$log_fp = fopen($log_file,"a");
	if ($log_fp === false)
	{
		SendAlert(GetMessage(MSG_FILE_OPEN_ERROR,array("NAME"=>$log_file,
											"TYPE"=>"log",
											"ERROR"=>CheckString($php_errormsg))));
		return;
	}
	$a_entry = array();
	$a_entry[] = gmdate("H:i:s d-M-y T");		// date/time in GMT
	$a_entry[] = $aServerVars['REMOTE_ADDR'];	// remote IP address
	$a_entry[] = $s_to;							// target email address
	$a_entry[] = $s_subj;						// subject line
	$a_entry[] = $s_info;						// information

	$s_log_entry = implode(",",$a_entry)."\n";
	fwrite($log_fp,$s_log_entry);
	fclose($log_fp);
}

	//
	// Send an email response to the user.
	//
function AutoRespond($s_to,$s_subj,$a_values)
{
	global	$aPHPVERSION,$SPECIAL_VALUES,$FROM_USER;

		//
		// need PHP 4.0.5 for the preg_replace_callback function
		//
	if (!IsPHPAtLeast("4.0.5"))
	{
		SendAlert(GetMessage(MSG_PHP_AUTORESP,
						array("PHPVERS"=>implode(".",$aPHPVERSION))));
		return (false);
	}

	$a_headers = array();
	$s_mail_text = "";
	$s_from_addr = "";

	if (isset($FROM_USER) && !empty($FROM_USER))
	{
		if ($FROM_USER != "NONE")
			$s_from_addr = $a_headers['From'] = $FROM_USER;
	}
	else
	{
		global	$SERVER;

		$s_from_addr = "FormMail@".$SERVER;
		$a_headers['From'] = $s_from_addr;
	}

	if (IsAROptionSet('PlainTemplate'))
	{
		$s_template = GetAROption("PlainTemplate");
		if (!ProcessTemplate($s_template,$a_lines,$a_values,
									GetAROption('TemplateMissing'),
									'SubstituteValuePlain'))
			return (false);
		$s_mail_text = implode(BODY_LF,$a_lines);
	}
	if (IsAROptionSet("HTMLTemplate"))
	{
		if (!MakeMimeMail($s_mail_text,$a_headers,$a_values,
							GetAROption("HTMLTemplate"),
							GetAROption('TemplateMissing')))
			return (false);
	}
	return (SendCheckedMail($s_to,$s_subj,$s_mail_text,$s_from_addr,$a_headers));
}

/*
 * The main logic starts here....
 */

 	//
	// First, a special case; if formmail.php is called like this:
	//	http://.../formmail.php?testalert=1
	// it sends a test message to the default alert address with some
	// information about your PHP version and the DOCUMENT_ROOT.
	//
if (isset($aGetVars["testalert"]) && $aGetVars["testalert"] == 1)
{
	function ShowServerVar($s_name)
	{
		global	$aServerVars;

		return (isset($aServerVars[$s_name]) ? $aServerVars[$s_name] : "-not set-");
	}
	$sAlert = GetMessage(MSG_ALERT,
				array("LANG"=>$sLangID,
					  "PHPVERS"=>implode(".",$aPHPVERSION),
					  "FM_VERS"=>$FM_VERS,
					  "SERVER"=>(IsServerWindows() ? "Windows" : "non-Windows"),
					  "DOCUMENT_ROOT"=>ShowServerVar('DOCUMENT_ROOT'),
					  "SCRIPT_FILENAME"=>ShowServerVar('SCRIPT_FILENAME'),
					  "PATH_TRANSLATED"=>ShowServerVar('PATH_TRANSLATED'),
					  "REAL_DOCUMENT_ROOT"=>CheckString($REAL_DOCUMENT_ROOT),
					 ));

	if (DEF_ALERT == "")
		echo "<p>".GetMessage(MSG_NO_DEF_ALERT)."</p>";
	elseif (SendAlert($sAlert,false,true))
		echo "<p>".GetMessage(MSG_TEST_SENT)."</p>";
	else
		echo "<p>".GetMessage(MSG_TEST_FAILED)."</p>";
	exit;
}

if (isset($aGetVars["testlang"]) && $aGetVars["testlang"] == 1)
{
	if (!IsPHPAtLeast("4.1.0"))
	{
	?>
		<p>testlang feature only works with PHP version 4.1.0 or later</p>
	<?php
	}
	else
	{
		function ShowMessages()
		{
			global	$aMessages,$sLangID,$bShowMesgNumbers,$aGetVars;

                //
                // force message numbers on unless "mnums=no"
                //
            if (isset($aGetVars["mnums"]) && $aGetVars["mnums"] == "no")
                $bShowMesgNumbers = false;
            else
                $bShowMesgNumbers = true;

			LoadBuiltinLanguage();

			$s_def_lang = $sLangID;
			$a_def_mesgs = $aMessages;

			LoadLanguageFile();

			$s_active_lang = $sLangID;
			$a_active_mesgs = $aMessages;

			$a_list = get_defined_constants();
			echo "<table border=\"1\" cellpadding=\"10\" width=\"95%\">\n";
			echo "<tr>\n";
			echo "<th>\n";
			echo "Message Number";
			echo "</th>\n";
			echo "<th>\n";
			echo "$s_def_lang";
			echo "</th>\n";
			echo "<th>\n";
			echo "$s_active_lang";
			echo "</th>\n";
			echo "</tr>\n";
			foreach ($a_list as $s_name=>$i_value)
			{
				if (substr($s_name,0,4) == "MSG_")
				{
					echo "<tr>\n";
					echo "<td valign=\"top\">\n";
					echo "$s_name ($i_value)";
					echo "</td>\n";
					echo "<td valign=\"top\">\n";
					$aMessages = $a_def_mesgs;
					$s_def_msg = GetMessage((int) $i_value,array(),true,true);
					echo nl2br(htmlentities($s_def_msg));
					echo "</td>\n";
					echo "<td valign=\"top\">\n";
					$aMessages = $a_active_mesgs;
					$s_act_msg = GetMessage((int) $i_value,array(),true,true);
					if ($s_def_msg == $s_act_msg)
						echo "<i>identical</i>\n";
					else
						echo nl2br(htmlentities($s_act_msg));
					echo "</td>\n";
					echo "</tr>\n";
				}
			}
			echo "</table>\n";
		}
		ShowMessages();
	}
	exit;
}

    //
    // Scan the Multi form sequence values and build up the values that
    // were submitted to the given form index.
    //
function GetMultiValues($a_form_list,$i_form_index,$a_order = array(),
                                            $a_clean = array(),
                                            $a_raw_data = array(),
                                            $a_all_data = array(),
                                            $a_file_data = array())
{
    $a_ret_clean = $a_ret_raw = $a_ret_all = $a_ret_files = array();
    for ($ii = 0 ; $ii < $i_form_index ; $ii++)
    {
            //
            // only add a field to the order if it's not already there
            //
        $a_form_order = $a_form_list[$ii]["ORDER"];
        $n_order = count($a_form_order);
        for ($jj = 0 ; $jj < $n_order ; $jj++)
        {
            if (array_search($a_form_order[$jj],$a_order) === false)
                $a_order[] = $a_form_order[$jj];
        }
        $a_ret_clean = array_merge($a_ret_clean,$a_form_list[$ii]["CLEAN"]);
        $a_ret_raw = array_merge($a_ret_raw,$a_form_list[$ii]["RAWDATA"]);
        $a_ret_all = array_merge($a_ret_all,$a_form_list[$ii]["ALLDATA"]);
        $a_ret_files = array_merge($a_ret_files,$a_form_list[$ii]["FILES"]);
    }
        //
        // later values must take precedence to earlier values,
        // so merge in the passed-in data last
        //
    $a_ret_clean = array_merge($a_ret_clean,$a_clean);
    $a_ret_raw = array_merge($a_ret_raw,$a_raw_data);
    $a_ret_all = array_merge($a_ret_all,$a_all_data);
    $a_ret_files = array_merge($a_ret_files,$a_file_data);
    return (array($a_order,$a_ret_clean,$a_ret_raw,$a_ret_all,$a_ret_files));
}

$bMultiForm = false;

    //
    // Multi-page form sequencing is complicated....
    // Requirements:
    //      1. The first page in a multi-page form sequence must provide:
    //          - multi_start field set to 1
    //          - this_form field (it's own URL)
    //          - next_form field (multi-page form template name)
    //      2. Subsequent pages must provide either:
    //          next_form (the next template name in the sequence)
    //         OR
    //          good_url or good_template or neither; this terminates
    //          the multi-page processing and provides the final URL.
    // Logic:
    //      1. We create session variables to contain information about
    //         the sequence.
    //      2. On the first submission from the starting form, we record
    //         its "this_form" URL and the data submitted.
    //         We also create a URL (to FormMail) that will allow return
    //         to the *next* form in the sequence.
    //      3. On submission from other forms in the sequence, we record
    //         the data that was submitted so we can return to that
    //         form with the user's data re-filled into the form.
    //         We also create a URL (to FormMail) that will allow return
    //         to the *next* form in the sequence.
    //      4. A return URL contains "return=index" where index is the
    //         form sequence index number.  This is a URL to FormMail.
    //         FormMail gets the template name or URL (URL only for the
    //         starting form) and outputs the requested HTML form.  It also
    //         truncates the session data for forms after the returned-to
    //         one.
    //

    //
    // Return to a previous form in a sequence.
    //
function MultiFormReturn($i_return_to)
{
    global  $aSessionVars;
    global  $iFormIndex;

    if (!isset($aSessionVars["FormList"]) ||
           !isset($aSessionVars["FormIndex"]) ||
            $i_return_to < 0 ||
            $i_return_to > $aSessionVars["FormIndex"])
        Error("cannot_return",GetMessage(MSG_CANNOT_RETURN,
                                array("TO"=>$i_return_to,
                                    "TOPINDEX"=>(
                                        isset($aSessionVars["FormIndex"]) ?
                                        $aSessionVars["FormIndex"] :
                                        "<undefined>"))),
                                false,false);
    assert($i_return_to < count($aSessionVars["FormList"]));
    $a_form_def = $aSessionVars["FormList"][$i_return_to];
    $aSessionVars["FormList"] = array_slice($aSessionVars["FormList"],0,$i_return_to+1);
    $aSessionVars["FormIndex"] = $iFormIndex = $i_return_to;
    if (isset($a_form_def["FORM"]))
    {
        list(,,$a_values,,) = GetMultiValues($aSessionVars["FormList"],$i_return_to);
        $a_lines = array();
        if (ProcessMultiFormTemplate($a_form_def["FORM"],$a_values,$a_lines))
        {
            $n_lines = count($a_lines);
            $s_buf = "";
            for ($ii = 0 ; $ii < $n_lines ; $ii++)
            {
                $s_buf .= $a_lines[$ii]."\n";
                unset($a_lines[$ii]);       // free memory (hopefully)
            }
            unset($a_lines);       // free memory (hopefully)
                //
                // put in the values that the user previously submitted
                // to this form
                //
            echo SetPreviousValues($s_buf,$a_form_def["RAWDATA"]);
        }
        else
		    Error("multi_form_failed",GetMessage(MSG_MULTIFORM_FAILED,
									array("NAME"=>$s_template)),false,false);
    }
    else
        ProcessReturnToForm($a_form_def["URL"],$a_form_def["RAWDATA"]);
    //echo "Returned to $i_return_to";
}

    //
    // Store any data just submitted and specified as "multi_keep".
    //
function MultiKeep()
{
    global  $SPECIAL_VALUES,$aSessionVars,$aRawDataValues;

    if (isset($SPECIAL_VALUES["multi_keep"]) &&
        !empty($SPECIAL_VALUES["multi_keep"]))
    {
        $a_list = TrimArray(explode(",",$SPECIAL_VALUES["multi_keep"]));
        if (!isset($aSessionVars["FormKeep"]))
            $aSessionVars["FormKeep"] = array();
            //
            // For each data field specified in "multi_keep" store its
            // value in the FormKeep session variable.
            // If a field is specified and does not exist in the
            // recent submission, its value is discarded.
            //
        foreach ($a_list as $s_fld_name)
            if (!empty($s_fld_name))
                if (isset($aRawDataValues[$s_fld_name]))
                    $aSessionVars["FormKeep"][$s_fld_name] = $aRawDataValues[$s_fld_name];
                else
                    unset($aSessionVars["FormKeep"][$s_fld_name]);
    }
}

    //
    // Perform Logic for Multi-Page form sequences
    //
function MultiFormLogic()
{
    global  $bMultiForm,$SPECIAL_VALUES,$aSessionVars,$aServerVars,$aFileVars;
    global  $sFormMailScript,$bGotGoBack,$bGotNextForm,$iFormIndex;
    global  $aFieldOrder,$aCleanedValues,$aRawDataValues,$aAllRawValues;

    if ($SPECIAL_VALUES["multi_start"] == 1)
    {
        if (empty($SPECIAL_VALUES["this_form"]))
            Error("need_this_form",GetMessage(MSG_NEED_THIS_FORM),false,false);

        $bMultiForm = true;
            //
            // Start of multi-page form sequence
            //
        $aSessionVars["FormList"] = array();
        $aSessionVars["FormList"][0] = array("URL"=>$SPECIAL_VALUES["this_form"],
                                            "ORDER"=>$aFieldOrder,
                                            "CLEAN"=>$aCleanedValues,
                                            "RAWDATA"=>$aRawDataValues,
                                            "ALLDATA"=>$aAllRawValues,
                                            "FILES"=>$aFileVars);
        $iFormIndex = $aSessionVars["FormIndex"] = 0;   // zero is the first form, which was
                                                        // just submitted
    }
    elseif (isset($aSessionVars["FormList"]))
        $bMultiForm = true;

    if ($bMultiForm)
    {
        if (isset($aServerVars["PHP_SELF"]) &&
            !empty($aServerVars["PHP_SELF"]) &&
            isset($aServerVars["SERVER_NAME"]) &&
            !empty($aServerVars["SERVER_NAME"]))
        {
            if (isset($aServerVars["SERVER_PORT"]) &&
                $aServerVars["SERVER_PORT"] != 80)
            {
                if ($aServerVars["SERVER_PORT"] == 443)     // SSL port
                        //
                        // just use https prefix
                        //
                    $sFormMailScript = "https://".$aServerVars["SERVER_NAME"].
                                                $aServerVars["PHP_SELF"];
                else
                        //
                        // use http with port number
                        //
                    $sFormMailScript = "http://".$aServerVars["SERVER_NAME"].
                                        ":".$aServerVars["SERVER_PORT"].
                                        $aServerVars["PHP_SELF"];
            }
            else
                $sFormMailScript = "http://".$aServerVars["SERVER_NAME"].
                                        $aServerVars["PHP_SELF"];
            $iFormIndex = $aSessionVars["FormIndex"];
        }
        else
            Error("no_php_self",GetMessage(MSG_NO_PHP_SELF),false,false);
    }

        //
        // If we're going forward in a multi-page form sequence,
        // compute a URL to return to the form we're about to display.
        //
    if ($bMultiForm && !$bGotGoBack)
    {
            //
            // record the data that was just submitted by the previous form
            //
        $iFormIndex = $aSessionVars["FormIndex"];
        $aSessionVars["FormList"][$iFormIndex]["ORDER"] = $aFieldOrder;
        $aSessionVars["FormList"][$iFormIndex]["CLEAN"] = $aCleanedValues;
        $aSessionVars["FormList"][$iFormIndex]["RAWDATA"] = $aRawDataValues;
        $aSessionVars["FormList"][$iFormIndex]["ALLDATA"] = $aAllRawValues;
		if (count($aFileVars) > 0 && !FILEUPLOADS)
			SendAlert(GetMessage(MSG_FILE_UPLOAD));
        elseif (count($aFileVars) > 0 && !SaveAllUploadedFiles($aFileVars))
            Error("upload_save_failed",GetMessage(MSG_MULTI_UPLOAD),false,false);
        $aSessionVars["FormList"][$iFormIndex]["FILES"] = $aFileVars;
        $iFormIndex++;
        $s_url = GetReturnLink($sFormMailScript,$iFormIndex);
        $aSessionVars["FormList"][$iFormIndex] = array("URL"=>$s_url,
                                    "FORM"=>$SPECIAL_VALUES["next_form"],
                                    "ORDER"=>$aFieldOrder,
                                    "CLEAN"=>$aCleanedValues,
                                    "RAWDATA"=>$aRawDataValues,
                                    "ALLDATA"=>$aAllRawValues,
                                    "FILES"=>$aFileVars);
        $aSessionVars["FormIndex"] = $iFormIndex;
        MultiKeep();
    }
}

    //
    // Check for the MIME Attack
    //
function DetectMimeAttack($a_fields,&$s_attack,&$s_info)
{
        //
        // if any of the recipient fields contain "MIME-Version" or
        // "Content-Type" then this is the MIME attack
        //
    $a_rec_flds = array("recipients","cc","bcc");   // all these fields must be scalar (not arrays)
    foreach ($a_rec_flds as $s_fld)
        if (isset($a_fields[$s_fld]) && is_scalar($a_fields[$s_fld]))
        {
            $s_data = strtolower($a_fields[$s_fld]);
            if (($i_mime = strpos($s_data,"mime-version")) !== false ||
                ($i_cont = strpos($s_data,"content-type")) !== false)
            {
                $s_attack = "MIME";
                $s_info = GetMessage(MSG_ATTACK_MIME_INFO,
                            array("FLD"=>$s_fld,
                                  "CONTENT"=>($i_mime !== false) ?
                                                "mime-version" :
                                                "content-type"),false);
                return (true);
            }
        }
    return (false);
}

    //
    // Check for the duplicate data attack
    //
function DetectDupAttack($a_fields,&$s_attack,&$s_info)
{
        //
        // if any of the configured fields contain duplicate data,
        // then this lame attack has been detected
        //
    global  $ATTACK_DETECTION_DUPS;

    $a_data_map = array();
    foreach ($ATTACK_DETECTION_DUPS as $s_fld)
        if (isset($a_fields[$s_fld]) &&
            is_scalar($a_fields[$s_fld]) &&    // can only work with string data
            !empty($a_fields[$s_fld]))
        {
            $s_data = (string) $a_fields[$s_fld];
            if (isset($a_data_map[$s_data]))
            {
                    //
                    // duplicate found!
                    //
                $s_attack = "Duplicate Fields";
                $s_info = GetMessage(MSG_ATTACK_DUP_INFO,
                            array("FLD1"=>$a_data_map[$s_data],
                                  "FLD2"=>$s_fld),false);
                return (true);
            }
            $a_data_map[$s_data] = $s_fld;
        }
    return (false);
}

    //
    // Check for the email addresses in specials attack
    //
function DetectSpecialsAttack($a_fields,&$s_attack,&$s_info)
{
        //
        // look for email addresses in these special fields
        //
    $a_specs = array("derive_fields","required","mail_options",
                    "good_url","bad_url","good_template","bad_template");
    foreach ($a_specs as $s_fld)
    {
        if (isset($a_fields[$s_fld]) &&
            is_scalar($a_fields[$s_fld]) &&    // can only work with string data
            !empty($a_fields[$s_fld]))
        {
            $s_data = $a_fields[$s_fld];
            if (preg_match("/^\b[-a-z0-9._%]+@[-.%_a-z0-9]+\.[a-z]{2,9}\b$/i",
                            $s_data) === 1)
            {
                    //
                    // email address found in wrong field
                    //
                $s_attack = "Special Fields";
                $s_info = GetMessage(MSG_ATTACK_SPEC_INFO,
                            array("FLD"=>$s_fld),false);
                return (true);
            }
        }
    }
    return (false);
}

    //
    // Detect annoying attacks and prevent them from sending spurious
    // alert messages.
    //
function DetectAttacks($a_fields)
{
    global      $ATTACK_DETECTION_DUPS;

    $s_info = $s_attack = "";
    $b_attacked = false;
    if (ATTACK_DETECTION_MIME)
        if (DetectMimeAttack($a_fields,$s_attack,$s_info))
            $b_attacked = true;
    if (!$b_attacked && !empty($ATTACK_DETECTION_DUPS))
        if (DetectDupAttack($a_fields,$s_attack,$s_info))
            $b_attacked = true;
    if (!$b_attacked && ATTACK_DETECTION_SPECIALS)
        if (DetectSpecialsAttack($a_fields,$s_attack,$s_info))
            $b_attacked = true;

    if ($b_attacked)
    {
        if (ALERT_ON_ATTACK_DETECTION)
	        SendAlert(GetMessage(MSG_ATTACK_DETECTED,
                    array("ATTACK"=>$s_attack,
                          "INFO"=>$s_info,)),
				        false);
        CreatePage(GetMessage(MSG_ATTACK_PAGE));
        exit;
    }
}

$bAdvTemplates = false;
if (ADVANCED_TEMPLATES &&
        (!empty($TEMPLATEDIR) || !empty($TEMPLATEURL) ||
        !empty($MULTIFORMDIR) || !empty($MULTIFORMURL)))
    $bAdvTemplates = true;

if (isset($aGetVars["return"]) && is_numeric($aGetVars["return"]))
{
        //
        // if advanced templates are in use, we will need them for
        // performing a multi-page form return
        //
    if ($bAdvTemplates)
    {
        $FMCTEMPLATE_PROC = true;
        if (!include_once("$MODULEDIR/$FMCOMPUTE"))
	        Error("load_fmcompute",GetMessage(MSG_LOAD_FMCOMPUTE,
						    array("FILE"=>"$MODULEDIR/$FMCOMPUTE",
                                    "ERROR"=>$php_errormsg)),false,false);
    }
    MultiFormReturn($aGetVars["return"]);
    exit;
}

    //
    // Hook system: after initialization
    //
if ($HOOK_DIR !== "")
    @include("$HOOK_DIR/fmhookpostinit.inc");

	//
	// check configuration values for potential security problems
	//
CheckConfig();

	//
	// otherwise, do the real processing of FormMail
	//
$aStrippedFormVars = $aAllRawValues = StripGPCArray($aFormVars);

if (ENABLE_ATTACK_DETECTION)
    DetectAttacks($aAllRawValues);

	//
	// process the options
	//
ProcessMailOptions($aAllRawValues);
ProcessCRMOptions($aAllRawValues);
ProcessAROptions($aAllRawValues);
ProcessFilterOptions($aAllRawValues);

	//
	// create any derived fields
	//
$aAllRawValues = CreateDerived($aAllRawValues);

list($aFieldOrder,$aCleanedValues,$aRawDataValues) = ParseInput($aAllRawValues);

    //
    // if we're processing multi-forms, then merge in the raw data from previous
    // forms
    //
if (isset($aSessionVars["FormList"]))
{
    list($aFieldOrder,$aCleanedValues,
            $aRawDataValues,$aAllRawValues,$aFileVars) = GetMultiValues(
                            $aSessionVars["FormList"],
                            $aSessionVars["FormIndex"],
                            $aFieldOrder,$aCleanedValues,
                            $aRawDataValues,$aAllRawValues,
                            $aFileVars);
}

if ($SPECIAL_VALUES["file_names"] !== "")
    list($aFieldOrder,$aCleanedValues,$aRawDataValues,$aAllRawValues,$aFileVars) =
            SetFileNames($SPECIAL_VALUES["file_names"],$aFieldOrder,
                    $aCleanedValues,$aRawDataValues,$aAllRawValues,$aFileVars);

    //
    // Hook system: after loading and processing data
    //
if ($HOOK_DIR !== "")
    @include("$HOOK_DIR/fmhookload.inc");

if ($FORM_INI_FILE !== "")
{
    ProcessFormIniFile($FORM_INI_FILE);
        //
        // Hook system: after processing INI file
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookinifile.inc");
}

$bDoneSomething = false;
if (DB_SEE_INPUT)
{
    /***
    echo "<pre>";
    print_r($aFormVars);
    print_r($aServerVars);
    echo "</pre>";
    exit;
    ****/
	CreatePage(implode("\n",$FORMATTED_INPUT));
	ZapSession();
    exit;
}

if (!empty($SPECIAL_VALUES["fmcompute"]) || $bAdvTemplates)
{
    $FM_UserErrors = array();
        //
        // Generalized interface between FMCompute and FormMail functions
        //
    function FM_CallFunction($s_func,$a_params,&$m_return,
                                &$s_mesg,&$a_debug,&$a_alerts)
    {
        switch ($s_func)
        {
        case "FMFatalError":
            SendComputeAlerts();
            if (count($a_params) < 3)
                Error("fmcompute_call",GetMessage(MSG_CALL_PARAM_COUNT,
                                        array("FUNC"=>$s_func,
                                            "COUNT"=>count($a_params))),
                                        false,false);
            else
                Error("fmcompute_error",$a_params[0],$a_params[1],$a_params[2]);
            break;

        case "FMFatalUserError":
            SendComputeAlerts();
            if (count($a_params) < 1)
                Error("fmcompute_call",GetMessage(MSG_CALL_PARAM_COUNT,
                                        array("FUNC"=>$s_func,
                                            "COUNT"=>count($a_params))),
                                        false,false);
            else
                UserError("fmcompute_usererror",$a_params[0]);
            break;

        case "FMUserError":
            if (count($a_params) < 1)
            {
                SendComputeAlerts();
                Error("fmcompute_call",GetMessage(MSG_CALL_PARAM_COUNT,
                                        array("FUNC"=>$s_func,
                                            "COUNT"=>count($a_params))),
                                        false,false);
            }
            else
            {
                global  $FM_UserErrors;

                $FM_UserErrors[] = $a_params[0];
            }
            break;

        case "FMSaveAllFilesToRepository":
            if (count($a_params) != 0)
            {
                SendComputeAlerts();
                Error("fmcompute_call",GetMessage(MSG_CALL_PARAM_COUNT,
                                        array("FUNC"=>$s_func,
                                            "COUNT"=>count($a_params))),
                                        false,false);
            }
            else
                $m_return = SaveAllFilesToRepository();
            break;

        default:
            $s_mesg = GetMessage(MSG_CALL_UNK_FUNC,array("FUNC"=>$s_func));
            return (false);
        }
        return (true);
    }

        //
        // register useful FormMail functions with FMCompute module
        //
    function RegisterFormMailFunctions(&$fmc)
    {
            //
            // Allows the user to call "Error" from within a computation
            //
        if (($s_msg = $fmc->RegisterExternalFunction("PHP","void",
                            "FMFatalError",
                            array("string","bool","bool"),
                            "FM_CallFunction")) !== true)
            Error("fmcompute_reg",GetMessage(MSG_REG_FMCOMPUTE,
                                    array("FUNC"=>"FMFatalError",
                                          "ERROR"=>$s_msg)),false,false);
            //
            // Allows the user to call "UserError" from within a computation
            //
        if (($s_msg = $fmc->RegisterExternalFunction("PHP","void",
                            "FMFatalUserError",
                            array("string"),
                            "FM_CallFunction")) !== true)
            Error("fmcompute_reg",GetMessage(MSG_REG_FMCOMPUTE,
                                    array("FUNC"=>"FMFatalUserError",
                                          "ERROR"=>$s_msg)),false,false);

            //
            // Allows the user to record an error to be displayed
            // from within a computation.
            //
        if (($s_msg = $fmc->RegisterExternalFunction("PHP","void",
                            "FMUserError",
                            array("string"),
                            "FM_CallFunction")) !== true)
            Error("fmcompute_reg",GetMessage(MSG_REG_FMCOMPUTE,
                                    array("FUNC"=>"FMUserError",
                                          "ERROR"=>$s_msg)),false,false);

            //
            // Saves files to the repository.
            //
        if (($s_msg = $fmc->RegisterExternalFunction("PHP","bool",
                            "FMSaveAllFilesToRepository",
                            array(),
                            "FM_CallFunction")) !== true)
            Error("fmcompute_reg",GetMessage(MSG_REG_FMCOMPUTE,
                                    array("FUNC"=>"FMSaveAllFilesToRepository",
                                          "ERROR"=>$s_msg)),false,false);

    }

        //
        // load the fmcompute module
        //
    if (!empty($SPECIAL_VALUES["fmcompute"]))
    {
        $FMCOMPUTE_CLASS = true;
        $FMCOMPUTE_NODEBUG = true;
    }
    if ($bAdvTemplates)
        $FMCTEMPLATE_PROC = true;
    if (!include_once("$MODULEDIR/$FMCOMPUTE"))
	    Error("load_fmcompute",GetMessage(MSG_LOAD_FMCOMPUTE,
						array("FILE"=>"$MODULEDIR/$FMCOMPUTE",
                                "ERROR"=>$php_errormsg)),false,false);
    if (!empty($SPECIAL_VALUES["fmcompute"]))
    {
        RegisterFormMailFunctions($FMCalc);

            //
            // if GeoIP support is specified, load that module now
            //
        if (!empty($GEOIP_LIC))
        {
            $FMMODULE_LOAD = true;      // signal module load
            if (!include_once("$MODULEDIR/$FMGEOIP"))
	            Error("load_module",GetMessage(MSG_LOAD_MODULE,
						        array("FILE"=>"$MODULEDIR/$FMGEOIP",
                                        "ERROR"=>$php_errormsg)),false,false);
                //
                // load the license and register the module
                //
            $GeoIP = new FMGeoIP($GEOIP_LIC);
            if (!$GeoIP->RegisterModule($FMCalc))
	            Error("reg_module",GetMessage(MSG_REGISTER_MODULE,
						        array("NAME"=>"FMGeoIP",
                                       "ERROR"=>$GeoIP->GetError())),false,false);
        }
    }
}

if (isset($SPECIAL_VALUES["multi_go_back"]) && !empty($SPECIAL_VALUES["multi_go_back"]))
{
    if (!isset($aSessionVars["FormList"]) || $aSessionVars["FormIndex"] == 0)
        Error("go_back",GetMessage(MSG_GO_BACK),false,false);
    MultiKeep();        // store any "multi_keep" data just submitted
    MultiFormReturn($aSessionVars["FormIndex"]-1);
//    echo "Form index = ".$aSessionVars["FormIndex"];
    exit;
}

	//
	// This is the check for spiders; I can't imagine a spider will
	// ever use the POST method.
	//
if ($bIsGetMethod && count($aFormVars) == 0)
{
	CreatePage(GetMessage(MSG_NO_DATA_PAGE));
	ZapSession();
	exit;
}

    //
    // Hook system: before performing required and conditions etc.
    //
if ($HOOK_DIR !== "")
    @include("$HOOK_DIR/fmhookprechecks.inc");

	//
	// check for required fields
	//
if (!CheckRequired($SPECIAL_VALUES["required"],$aAllRawValues,$missing,$a_missing_list))
	UserError("missing_fields",GetMessage(MSG_REQD_ERROR),$missing,$a_missing_list);

	//
	// check complex conditions
	//
if (!CheckConditions($SPECIAL_VALUES["conditions"],$aAllRawValues,$missing,$a_missing_list))
	UserError("failed_conditions",GetMessage(MSG_COND_ERROR),$missing,$a_missing_list);

    //
    // check imgverify
    //
if (isset($SPECIAL_VALUES["imgverify"]) && !empty($SPECIAL_VALUES["imgverify"]))
{
	if (!isset($aSessionVars["VerifyImgString"]))
		Error("verify_failed",GetMessage(MSG_VERIFY_MISSING),false);
		//
		// the user's entry must match the value in the session; allow
		// spaces in the user's input
		//
	if (str_replace(" ","",$SPECIAL_VALUES["imgverify"]) !==
				$aSessionVars["VerifyImgString"])
		UserError("img_verify",GetMessage(MSG_VERIFY_MATCH));
}

    //
    // Hook system: after performing required and conditions etc.
    //
if ($HOOK_DIR !== "")
    @include("$HOOK_DIR/fmhookchecks.inc");

if (!empty($SPECIAL_VALUES["fmmodules"]))
{
    $aModuleList = TrimArray(explode(",",$SPECIAL_VALUES["fmmodules"]));
    $FMMODULE_LOAD = true;      // signal module load
    foreach ($aModuleList as $sModule)
        if (!include_once("$MODULEDIR/$sModule"))
	        Error("load_module",GetMessage(MSG_LOAD_MODULE,
						    array("FILE"=>"$MODULEDIR/$sModule",
                                    "ERROR"=>$php_errormsg)),false,false);
}

if (!empty($SPECIAL_VALUES["fmcompute"]))
{
        //
        // Callback function for preg_replace_callback to add line
        // numbers on each match
        //
    function AddLineNumbersCallback($a_matches)
    {
        global  $iAddLineNumbersCounter;

        return (sprintf("%d:",++$iAddLineNumbersCounter).$a_matches[0]);
    }
        //
        // Add line numbers to some code
        //
    function AddLineNumbers($s_code)
    {
        global  $iAddLineNumbersCounter;

        $iAddLineNumbersCounter = 0;
        return (preg_replace_callback('/^/m','AddLineNumbersCallback',$s_code));
    }

        //
        // Load some more code into FMCalc
        //
    function Load($s_code)
    {
        global  $FMCalc;

        $a_mesgs = array();
       // echo "Loading '$s_code'";
        if ($FMCalc->Parse($s_code,$a_mesgs) === false)
        {
            $s_msgs = "";
            foreach ($a_mesgs as $a_msg)
            {
                $s_msgs .= "Line ".$a_msg["LINE"];
                $s_msgs .= ", position ".$a_msg["CHAR"].": ";
                $s_msgs .= $a_msg["MSG"]."\n";
            }
            Error("fmcompute_parse",GetMessage(MSG_COMP_PARSE,
                        array("CODE"=>AddLineNumbers($s_code),
                                "ERRORS"=>$s_msgs)),false,false);
        }
    }

        //
        // Send any alerts found in FMCalc
        //
    function SendComputeAlerts()
    {
        global  $FMCalc;

        $a_alerts = $FMCalc->GetAlerts();
        if (count($a_alerts) > 0)
            SendAlert(GetMessage(MSG_COMP_ALERT,
                        array("ALERTS"=>implode("\n",$a_alerts))));
        $a_debug = $FMCalc->GetDebug();
        if (count($a_debug) > 0)
            SendAlert(GetMessage(MSG_COMP_DEBUG,
                        array("DEBUG"=>implode("\n",$a_debug))));
    }
        //
        // Perform the computations in FMCalc
        //
    function Compute(&$a_field_order,&$a_cleaned_values,&$a_raw_data_values,
                            &$a_values)
    {
        global  $FMCalc,$FM_UserErrors;

        $a_mesgs = array();
        $FM_UserErrors = array();
        if (($a_flds = $FMCalc->Execute($a_mesgs)) !== false)
        {
            SendComputeAlerts();
            foreach ($a_flds as $s_name=>$s_value)
            {
                $a_values[$s_name] = $s_value;
                ProcessField($s_name,$s_value,$a_field_order,
                                $a_cleaned_values,$a_raw_data_values);
            }
            if (count($FM_UserErrors) > 0)
                UserError("fmcompute_usererrors",GetMessage(MSG_USER_ERRORS),
                                "",$FM_UserErrors);
        }
        else
        {
            SendComputeAlerts();
            Error("fmcompute_exec",GetMessage(MSG_COMP_EXEC,
                        array("ERRORS"=>implode("\n",$a_mesgs))),false,false);
        }
    }

        //
        // Register all fields; a future improvement should use a call-back
        // function so as not to copy all the data into the FMCompute object
        //
    function RegisterData($a_form_data,$a_file_vars)
    {
        global  $FMCalc;

        foreach ($a_form_data as $s_name=>$s_value)
            if (isset($s_name) && isset($s_value))
                if (($s_msg = $FMCalc->RegisterExternalData("PHP","string",
                                                $s_name,"c",$s_value)) !== true)
                    Error("fmcompute_regdata",GetMessage(MSG_COMP_REG_DATA,
                                array("NAME"=>$s_name,"ERROR"=>$s_msg)),false,false);

        foreach ($a_file_vars as $s_fld_name=>$a_file_spec)
        {
            if (IsUploadedFile($a_file_spec))
                $s_value = $a_file_spec['name'];
            else
                $s_value = "";
            if (($s_msg = $FMCalc->RegisterExternalData("PHP","string",
                                            $s_fld_name,"c",$s_value)) !== true)
                Error("fmcompute_regdata",GetMessage(MSG_COMP_REG_DATA,
                            array("NAME"=>$s_fld_name,"ERROR"=>$s_msg)),false,false);
        }
    }
    RegisterData($aAllRawValues,$aFileVars);
        //
        // parse all fmcompute fields
        //
    if (is_array($SPECIAL_VALUES["fmcompute"]))
    {
        $nCompute = count($SPECIAL_VALUES["fmcompute"]);
        for ($iCompute = 0 ; $iCompute < $nCompute ; $iCompute++)
            Load($SPECIAL_VALUES["fmcompute"][$iCompute]);
    }
    else
        Load($SPECIAL_VALUES["fmcompute"]);

        //
        // run computations
        //
    Compute($aFieldOrder,$aCleanedValues,$aRawDataValues,$aAllRawValues);
        //
        // Hook system: after computations
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookcompute.inc");
}

$bGotGoBack = $bGotNextForm = $bGotGoodTemplate = $bGotGoodUrl = false;
if (isset($SPECIAL_VALUES["good_url"]) &&
    !empty($SPECIAL_VALUES["good_url"]))
    $bGotGoodUrl = true;

if (isset($SPECIAL_VALUES["good_template"]) &&
    !empty($SPECIAL_VALUES["good_template"]))
    $bGotGoodTemplate = true;

if (isset($SPECIAL_VALUES["next_form"]) &&
    !empty($SPECIAL_VALUES["next_form"]))
    $bGotNextForm = true;

if (isset($SPECIAL_VALUES["multi_go_back"]) &&
    !empty($SPECIAL_VALUES["multi_go_back"]))
    $bGotGoBack = true;

    //
    // it's not valid to specify "next_form" as well as "good_url" or
    // "good_template"; this is because it's ambiguous - do we go to the
    // next form or the final 'thank you' page?
    //
if ($bGotNextForm && ($bGotGoodTemplate || $bGotGoodUrl))
    Error("next_plus_good",GetMessage(MSG_NEXT_PLUS_GOOD,array("WHICH"=>
                                    ($bGotGoodUrl ? "good_url" :
                                    "good_template"))),false,false);

MultiFormLogic();

    //
    // Hook system: after multi-page form logic
    //
if ($HOOK_DIR !== "")
    @include("$HOOK_DIR/fmhookmulti.inc");

	//
	// write to the CSV database
	//
if (!empty($CSVDIR) && isset($SPECIAL_VALUES["csvfile"]) &&
						!empty($SPECIAL_VALUES["csvfile"]))
{
        //
        // Hook system: before writing CSV file
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookprecsv.inc");
	WriteCSVFile($CSVDIR."/".basename($SPECIAL_VALUES["csvfile"]),$aAllRawValues);
        //
        // Hook system: after writing CSV file
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookpostcsv.inc");
	$bDoneSomething = true;
}

	//
	// write to the log file
	//
if (!empty($LOGDIR) && isset($SPECIAL_VALUES["logfile"]) && !empty($SPECIAL_VALUES["logfile"]))
{
        //
        // Hook system: before writing log file
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookprelog.inc");
	WriteLog($LOGDIR."/".basename($SPECIAL_VALUES["logfile"]));
        //
        // Hook system: after writing log file
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookpostlog.inc");
	$bDoneSomething = true;
}

	//
	// send to the CRM
	//
if (isset($SPECIAL_VALUES["crm_url"]) && isset($SPECIAL_VALUES["crm_spec"]))
{
	$sCRM = GetCRMURL($SPECIAL_VALUES["crm_spec"],$aAllRawValues,$SPECIAL_VALUES["crm_url"]);
	if (!empty($sCRM))
	{
		$aCRMReturnData = array();
            //
            // Hook system: before sending to CRM
            //
        if ($HOOK_DIR !== "")
            @include("$HOOK_DIR/fmhookprecrm.inc");
		if (!SendToCRM($sCRM,$aCRMReturnData))
		{
				//
				// CRM interface failed, check if the form wants an error
				// displayed
				//
			if (IsCRMOptionSet("ErrorOnFail"))
				Error("crm_failed",GetMessage(MSG_CRM_FAILURE));
		}
		else
				//
				// append the returned data to the raw data values of the form
				//
			$aRawDataValues = array_merge($aRawDataValues,$aCRMReturnData);
            //
            // Hook system: after sending to CRM
            //
        if ($HOOK_DIR !== "")
            @include("$HOOK_DIR/fmhookpostcrm.inc");
		$bDoneSomething = true;
	}
}

	//
	// Check obsolete SendMailFOption
	//
if (IsMailOptionSet("SendMailFOption"))
	SendAlert(GetMessage(MSG_FOPTION_WARN,array("LINE"=>SENDMAIL_F_OPTION_LINE)),
				false,true);

	//
	// send email
	//
if (!isset($SPECIAL_VALUES["recipients"]) || empty($SPECIAL_VALUES["recipients"]))
{
		//
		// No recipients - don't email anyone...
		// If nothing has been done above (CSV, logging, or CRM),
		// then report an error.
		//
	if (!$bDoneSomething)
        if (!$bGotGoBack && !$bGotNextForm)
	        Error("no_recipients",GetMessage(MSG_NO_ACTIONS));
}
else
{
        //
        // Hook system: before sending emails
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookpreemail.inc");
	$s_invalid = $s_invalid_cc = $s_invalid_bcc = "";
	if (!CheckEmailAddress($SPECIAL_VALUES["recipients"],$s_valid_recipients,$s_invalid))
		Error("no_valid_recipients",GetMessage(MSG_NO_RECIP));
	else
	{
		$s_valid_cc = $s_valid_bcc = "";

			//
			// check CC and BCC addresses
			//
		if (isset($SPECIAL_VALUES["cc"]) && !empty($SPECIAL_VALUES["cc"]))
			CheckEmailAddress($SPECIAL_VALUES["cc"],$s_valid_cc,$s_invalid_cc);
		if (isset($SPECIAL_VALUES["bcc"]) && !empty($SPECIAL_VALUES["bcc"]))
			CheckEmailAddress($SPECIAL_VALUES["bcc"],$s_valid_bcc,$s_invalid_bcc);

			//
			// send an alert for invalid addresses
			//
		$s_error = "";
		if (!empty($s_invalid))
			$s_error .= "recipients: $s_invalid\r\n";
		if (!empty($s_invalid_cc))
			$s_error .= "cc: $s_invalid_cc\r\n";
		if (!empty($s_invalid_bcc))
			$s_error .= "bcc: $s_invalid_bcc\r\n";
		if (!empty($s_error))
			SendAlert(GetMessage(MSG_INV_EMAIL,array("ERRORS"=>$s_error)));

			//
			// send the actual results
			//
		if (!SendResults($aFieldOrder,$aCleanedValues,$s_valid_recipients,$s_valid_cc,
							$s_valid_bcc,$aRawDataValues))
			Error("mail_failed",GetMessage(MSG_FAILED_SEND));
            //
            // Hook system: after sending emails
            //
        if ($HOOK_DIR !== "")
            @include("$HOOK_DIR/fmhookpostemail.inc");
	}
}

	//
	// if the user didn't enter the verification code,
	// just skip the autoresponse
	//
if (isset($SPECIAL_VALUES["arverify"]) && !empty($SPECIAL_VALUES["arverify"]))
	if (IsAROptionSet('HTMLTemplate') || IsAROptionSet('PlainTemplate'))
	{
		if (!isset($SPECIAL_VALUES["email"]) || empty($SPECIAL_VALUES["email"]))
			SendAlert(GetMessage(MSG_ARESP_EMAIL));
		else
		{
                //
                // Hook system: before sending auto response
                //
            if ($HOOK_DIR !== "")
                @include("$HOOK_DIR/fmhookprearesp.inc");
			$sAutoRespTo = $SPECIAL_VALUES["email"];
			if (IsAROptionSet('Subject'))
				$sAutoRespSubj = GetAROption('Subject');
			else
				$sAutoRespSubj = GetMessage(MSG_ARESP_SUBJ,array(),false);

			if (!isset($aSessionVars["VerifyImgString"]))
			{
				WriteARLog($sAutoRespTo,$sAutoRespSubj,
						GetMessage(MSG_LOG_NO_VERIMG,array(),false));
				Error("verify_failed",GetMessage(MSG_ARESP_NO_AUTH),true);
			}
				//
				// the user's entry must match the value in the session; allow
				// spaces in the user's input
				//
			if (str_replace(" ","",$SPECIAL_VALUES["arverify"]) !==
						$aSessionVars["VerifyImgString"])
			{
				WriteARLog($sAutoRespTo,$sAutoRespSubj,
							GetMessage(MSG_LOG_NO_MATCH,array(),false));
				UserError("ar_verify",GetMessage(MSG_ARESP_NO_MATCH));
			}
			elseif (!AutoRespond($sAutoRespTo,$sAutoRespSubj,$aRawDataValues))
			{
				WriteARLog($sAutoRespTo,$sAutoRespSubj,
							GetMessage(MSG_LOG_FAILED,array(),false));
				SendAlert(GetMessage(MSG_ARESP_FAILED));
			}
			else
            {
				WriteARLog($sAutoRespTo,$sAutoRespSubj,
							GetMessage(MSG_LOG_OK,array(),false));
                    //
                    // Hook system: after sending auto response
                    //
                if ($HOOK_DIR !== "")
                    @include("$HOOK_DIR/fmhookpostaresp.inc");
            }
		}
	}

    //
    // multi-form processing
    //
if ($bGotNextForm)
{
    OutputMultiFormTemplate($SPECIAL_VALUES["next_form"],$aRawDataValues);
//    echo "Form index = ".$aSessionVars["FormIndex"];
}
else
{
        //
        // Hook system: before finishing
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookprefinish.inc");
	    //
	    // redirect to the good URL page, or create a default page;
        // we're no longer processing a multi-page form sequence
	    //
    unset($aSessionVars["FormList"]);
    unset($aSessionVars["FormIndex"]);
    unset($aSessionVars["FormKeep"]);
    if (!$bGotGoodUrl)
    {
	    if ($bGotGoodTemplate)
		    OutputTemplate($SPECIAL_VALUES["good_template"],$aRawDataValues);
	    else
		    CreatePage(GetMessage(MSG_THANKS_PAGE));
    }
    else
	    Redirect($SPECIAL_VALUES["good_url"]);
        //
        // Hook system: after finishing (before session is cleared)
        //
    if ($HOOK_DIR !== "")
        @include("$HOOK_DIR/fmhookpostfinish.inc");
	    //
	    // everything's good, so we don't need the session any more
	    //
    ZapSession();
}
?>
