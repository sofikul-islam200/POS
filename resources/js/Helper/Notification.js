class Notification {
    success(){
		new Noty({
		    type: 'success',
		    layout: 'topRight',
		    text: 'Successfully insert Done',
		    timeout: 1000,
		}).show();

    }

	image_validation(){
		new Noty({
		    type: 'error',
		    layout: 'topRight',
		    text: 'Image less than 1 mb',
		    timeout: 1000,
		}).show();
	}
}
export default Notification = new Notification();
