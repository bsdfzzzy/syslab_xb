/**
 * FancyUpload - Flash meets Ajax for simply working uploads
 *
 * @version		2.0 beta 3
 *
 * @license		MIT License
 *
 * @author		Harald Kirschner <mail [at] digitarald [dot] de>
 * @copyright	Authors
 */

var FancyUpload2 = new Class({

	Extends: Swiff.Uploader,

	options: {
		limitSize: false,
		limitFiles: 0,
		total_uploaded :0,
		total_failed:0,
		cancel_wait_time: 60000,
		auto_confirm_cancel: false,
		instantStart: false,
		allowDuplicates: false,
		validateFile: $lambda(true), // provide a function that returns true for valid and false for invalid files.

		fileInvalid: null, // called for invalid files with error stack as 2nd argument
		fileCreate: null, // creates file element after select
		fileUpload: null, // called when file is opened for upload, allows to modify the upload options (2nd argument) for every upload
		fileComplete: null, // updates the file element to completed state and gets the response (2nd argument)
		fileRemove: null // removes the element
		/**
		 * Events:
		 * onSelect, onAllSelect, onCancel, onBeforeOpen, onOpen, onProgress, onComplete, onError, onAllComplete
		 */
	},

	initialize: function(status, list, options) {
		this.status = $(status);
		this.list = $(list);

		this.files = [];

		if (options.callBacks) {
			this.addEvents(options.callBacks);
			options.callBacks = null;
		}
		this.parent(options);
		this.render();
	},

	render: function() {
		this.overallTitle = this.status.getElement('.overall-title');
		this.currentTitle = this.status.getElement('.current-title');
		this.currentText = this.status.getElement('.current-text');
		this.errorList = this.status.getElement('.error-list');
		this.totalFailed = this.status.getElement('.total-failed');
		this.totalUploaded = this.status.getElement('.total-uploaded');
		
		
		var progress = this.status.getElement('.overall-progress');
		this.overallProgress = new Fx.ProgressBar(progress, {
			text: new Element('span', {'class': 'progress-text'}).inject(progress, 'after')
		});
		progress = this.status.getElement('.current-progress')
		this.currentProgress = new Fx.ProgressBar(progress, {
			text: new Element('span', {'class': 'progress-text'}).inject(progress, 'after')
		});
	},

	onLoad: function() {
		this.log('Uploader ready!');
		window.fancyupload_obj = this;
	},

	onBeforeOpen: function(file, options) {
		var fn = this.options.fileUpload;
		if (fn) fn.call(this, file, options);
		this.log('Initialize upload for "{name}".', file);
		this.current_uploading_file = file;
	},

	onOpen: function(file, overall) {
		this.log('Starting upload "{name}".', file);
		file = this.getFile(file);
		file.element.addClass('file-uploading');
		this.currentProgress.cancel().set(0);
		this.currentTitle.set('html', '当前文件 "{name}"'.substitute(file) );
		if (this.progress_cancel_timer)
		{
			clearTimeout(this.progress_cancel_timer);
		}
		this.progress_cancel_timer = setTimeout(this.confirm_cancel,this.options.cancel_wait_time);
	},

	onProgress: function(file, current, overall) {
		if (this.progress_cancel_timer)
		{
			clearTimeout(this.progress_cancel_timer);
		}
		this.progress_cancel_timer = setTimeout(this.confirm_cancel,this.options.cancel_wait_time);
		
		this.overallProgress.start(overall.bytesLoaded, overall.bytesTotal);
		this.currentText.set('html', '速度: {rate}/s , 剩余时间: ~{timeLeft}'.substitute({
			rate: (current.rate) ? this.sizeToKB(current.rate) : '- B',
			timeLeft: Date.fancyDuration(current.timeLeft || 0)
		}));
		this.currentProgress.start(current.bytesLoaded, current.bytesTotal);
	},

	confirm_cancel: function(o)
	{
		if (window.fancyupload_obj.options.auto_confirm_cancel || confirm('文件 '+window.fancyupload_obj.current_uploading_file.name+' 无响应！\n 要取消上传该文件吗？'))
		{
			window.fancyupload_obj.show_error_info(window.fancyupload_obj.current_uploading_file,'长时间无响应,已取消上传');
			window.fancyupload_obj.removeFile(window.fancyupload_obj.current_uploading_file);
		}
	},


	show_error_info:function(file,s)
	{
		this.options.total_failed++;
		this.totalFailed.set('html',this.options.total_failed);
		var div = document.createElement('div');
		div.className = 'error-item';
		div.innerHTML = file.name+'上传失败: '+s;
		this.errorList.appendChild(div);
	},

	show_success_info:function(file,s)
	{
		this.options.total_uploaded++;
		this.totalUploaded.set('html',this.options.total_uploaded);
	},
	
	
	onSelect: function(file, index, length) {
		var errors = [];
		if (this.options.limitSize && (file.size > this.options.limitSize)) errors.push('size');
		if (this.options.limitFiles && (this.countFiles() >= this.options.limitFiles)) errors.push('length');
		if (!this.options.allowDuplicates && this.getFile(file)) errors.push('duplicate');
		if (!this.options.validateFile.call(this, file, errors)) errors.push('custom');
		if (errors.length) {
			var fn = this.options.fileInvalid;
			if (fn) fn.call(this, file, errors);
			return false;
		}
		(this.options.fileCreate || this.fileCreate).call(this, file);
		this.files.push(file);
		return true;
	},

	onAllSelect: function(files, current, overall) {
		
		this.log('Added ' + files.length + ' files, now we have (' + current.bytesTotal + ' bytes).', arguments);
		this.updateOverall(current.bytesTotal);
		this.status.removeClass('status-browsing');
		if (this.files.length && this.options.instantStart) this.upload.delay(10, this);
	},

	onComplete: function(file, response) 
	{
		if (this.progress_cancel_timer)
		{
			clearTimeout(this.progress_cancel_timer);
		}
		this.log('Completed upload "' + file.name + '".', arguments);
		this.currentText.set('html', '上传完成!');
		this.currentProgress.start(100);
		(this.options.fileComplete || this.fileComplete).call(this, this.finishFile(file), response);
	},

	onError: function(file, error, info) 
	{
		if (this.progress_cancel_timer)
		{
			clearTimeout(this.progress_cancel_timer);
		}
		this.log('Upload "' + file.name + '" failed. "{1}": "{2}".', arguments);
		(this.options.fileError || this.fileError).call(this, this.finishFile(file), error, info);
	},

	onCancel: function() 
	{
		if (this.progress_cancel_timer)
		{
			clearTimeout(this.progress_cancel_timer);
		}
		this.log('Filebrowser cancelled.', arguments);
		this.status.removeClass('file-browsing');
	},

	onAllComplete: function(current) {
		if (this.progress_cancel_timer)
		{
			clearTimeout(this.progress_cancel_timer);
		}
		this.log('Completed all files, ' + current.bytesTotal + ' bytes.', arguments);
		this.updateOverall(current.bytesTotal);
		this.overallProgress.start(100);
		this.status.removeClass('file-uploading');
	},

	browse: function(fileList) {
		var ret = this.parent(fileList);
		if (ret !== true){
			this.log('Browse in progress.');
			if (ret) alert(ret);
		} else {
			this.log('Browse started.');
			this.status.addClass('file-browsing');
		}
	},

	upload: function(options) {
		var ret = this.parent(options);
		if (ret !== true) {
			this.log('Upload in progress or nothing to upload.');
			if (ret) alert(ret);
		} else {
			this.log('Upload started.');
			this.status.addClass('file-uploading');
			this.overallProgress.set(0);
		}
	},

	removeFile: function(file) {
		
		var remove = this.options.fileRemove || this.fileRemove;
		if (!file) {
			this.files.each(remove, this);
			this.files.empty();
			this.updateOverall(0);
		} else {
			if (!file.element) file = this.getFile(file);
			this.files.erase(file);
			remove.call(this, file);
			this.updateOverall(this.bytesTotal - file.size);
		}
		this.parent(file);
	},

	getFile: function(file) {
		var ret = null;
		this.files.some(function(value) {
			if ((value.name != file.name) || (value.size != file.size)) return false;
			ret = value;
			return true;
		});
		return ret;
	},

	countFiles: function() {
		var ret = 0;
		for (var i = 0, j = this.files.length; i < j; i++) {
			if (!this.files[i].finished) ret++;
		}
		return ret;
	},

	updateOverall: function(bytesTotal) {
		this.bytesTotal = bytesTotal;
		this.overallTitle.set('html', '总体进度 (' + this.sizeToKB(bytesTotal) + ')');
	},

	finishFile: function(file) {
		
		file = this.getFile(file);
		file.element.removeClass('file-uploading');
		file.finished = true;
		return file;
	},

	fileCreate: function(file) {
		file.info = new Element('span', {'class': 'file-info'});
		file.element = new Element('li', {'class': 'file'}).adopt(
			new Element('span', {'class': 'file-name', 'html': file.name}),
			new Element('a', {
				'class': 'file-remove',
				'href': '#',
				'html': '删除',
				'events': {
					'click': function() {
						
						this.removeFile(file);
						return false;
					}.bind(this)
				}
			}),
			new Element('span', {'class': 'file-size', 'html': this.sizeToKB(file.size)}),
			file.info
		).inject(this.list);
	},

	fileComplete: function(file, response) {
		this.options.processResponse || this
		var json = $H(JSON.decode(response, true));
		if (json.get('result') == 'success') {
			file.element.addClass('file-success');
			file.info.set('html', json.get('size'));
			this.show_success_info(file,response);
			(this.options.fileRemove || this.fileRemove).call(this, file);
		} else {
			file.element.addClass('file-failed');
			file.info.set('html', json.get('error') || response);
			this.show_error_info(file,json.get('error') || response);
			(this.options.fileRemove || this.fileRemove).call(this, file);
		}
	},

	

	fileError: function(file, error, info) {
		file.element.addClass('file-failed');
		this.show_error_info(file,'<strong>' + error + '</strong>:' + info);
		file.info.set('html', '<strong>' + error + '</strong>:' + info);
		(this.options.fileRemove || this.fileRemove).call(this, file);
	},

	fileRemove: function(file) {
		file.element.fade('out').retrieve('tween').chain(Element.destroy.bind(Element, file.element));
	},

	sizeToKB: function(size) {
		var unit = 'B';
		if ((size / 1048576) > 1) {
			unit = 'MB';
			size /= 1048576;
		} else if ((size / 1024) > 1) {
			unit = 'kB';
			size /= 1024;
		}
		return size.round(1) + ' ' + unit;
	},

	log: function(text, args) {
		if (window.console) console.log(text.substitute(args || {}));
	}

});

/**
 * @todo Clean-up, into Date.js
 */
Date.parseDuration = function(sec) {

	var units = {}, conv = Date.durations;
	for (var unit in conv) {
		var value = Math.floor(sec / conv[unit]);
		if (value) {
			units[unit] = value;
			if (!(sec -= value * conv[unit])) break;
		}
	}
	return units;
};

Date.fancyDuration = function(sec) {
	var ret = [], units = Date.parseDuration(sec);
	for (var unit in units) ret.push(units[unit] + Date.durationsAbbr[unit]);
	return ret.join(', ');
};

Date.durations = {years: 31556926, months: 2629743.83, days: 86400, hours: 3600, minutes: 60, seconds: 1, milliseconds: 0.001};
Date.durationsAbbr = {
	years: 'j',
	months: 'm',
	days: 'd',
	hours: 'h',
	minutes: 'min',
	seconds: 'sec',
	milliseconds: 'ms'
};