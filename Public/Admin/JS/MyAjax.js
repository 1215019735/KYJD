/**
 * 自定义Ajax
 * @param {*} $data 
 * @param {*} $url 
 * @param {*} $func 
 */
function MyAjax($data, $url, $func, $type = 'POST', $dataType = 'JSON') {
	$.ajax({
		type: $type,
		url: $url,
		data: $data,
		dataType: $dataType,
		beforeSend: function () {
			$('#loadModal').modal('show');
		},
		error: function () {
			$('#loadModal').modal('hide');
			alert('错误！');
		},
		success: function (data) {
			$('#loadModal').modal('hide');
			$('.alert').css({
				'display': 'block'
			});
			$func(data);
		}
	})
}

//Ajax方法封装
var common = {
	confAction: function ($this, $data, $txt) {
		var $url = $($this).attr('ajax-url');
		if ($url == undefined) {
			alert('参数错误！');
			return false;
		}
		if (confirm($txt)) {
			MyAjax($data, $url, function (d) {
				if (d.status == 1) {
					setTimeout(function () {
						location.reload();
					}, 2000);
				} else {
					alert('操作失败！');
				}
			})
		}
	},
	formAction: function ($form, $url, $txt) {

	},
	DelAll: function ($form, $this) {
		var $url = $($this).attr('ajax-url');
		if ($url == undefined) {
			alert('参数错误！');
			return false;
		}
		var id = $($form).find('input[name="checkbox"]:checkbox').serialize().replace(/checkbox=/g, '');
		if (id) {
			if (confirm('确定删除？')) {
				MyAjax({
					id: id
				}, $url, function (d) {
					if (d.status == 1) {
						setTimeout(function () {
							location.reload();
						}, 2000);
					} else {
						alert('删除失败！');
					}
				})
			}
		}
	}
}