import React, { Component } from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import ReactDOM from 'react-dom';

export default class Work extends React.Component {
	constructor(props) {
		super(props);
		this.state = {
			works: []
		}
		
		// DBから「work」テーブルを取得する
		axios.get('work/json').then(response=>{
			let get_work = response.data;
			this.setState({works:get_work});
		});
	}
	
	works() {
		return this.state.works.map(data => {
			var url = "pf/work/" + data.id;
			var name = "storage/files/" + data.id + ".jpg";
			return (
				<div key={data}>
					<a href={url}><img src={name} /></a>
				</div>
			)
		});
	}
	
	render() {
		const settings = {
			dots: true,
			infinite: true,
			speed: 500,
			slidesToShow: 1,
			slidesToScroll: 1,
			AdaptiveHeight: true
		}
		
		return (
			<div>
				<Slider {...settings}>
					{this.works()}
				</Slider>
			</div>
		);
	}
}

if (document.getElementById('work')) {	
    ReactDOM.render(<Work />, document.getElementById('work'));	
}