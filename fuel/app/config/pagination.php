<?php

return array(
	'active' => 'default',
	'default' => 
	array(
			'wrapper' => '
				<div class="pagination">
					{pagination}
				</div>
			',
			'first' => '
				<span class="first">
					{link}
				</span>
		',
		'first-marker' => '&laquo;&laquo;',
		'first-link' => '		<a href="{uri}">{page}</a>',
		'first-inactive' => '',
		'first-inactive-link' => '',
		'previous' => '
			<span class="previous">
				{link}
			</span>
		',
		'previous-marker' => '&laquo;',
		'previous-link' => '		<a href="{uri}" rel="prev">{page}</a>',
		'previous-inactive' => '
		<span class="previous-inactive">
			{link}
		</span>',
		'previous-inactive-link' => '		<a href="#" rel="prev">{page}</a>',
		'regular' => '
			<span>
				{link}
			</span
		',
		'regular-link' => '		
			<a href="{uri}">{page}</a>
		',
		'active' => '
			<span class="active">
				{link}
			</span>
		',
		'active-link' => '		
			<a href="#">{page}</a>
		',
		'next' => '
			<span class="next">
				{link}
			</span>
		',
		'next-marker' => '&raquo;',
		'next-link' => '		
			<a href="{uri}" rel="next">{page}</a>
		',
		'next-inactive' => '
			<span class="next-inactive">
				{link}
			</span>
		',
		'next-inactive-link' => '		
			<a href="#" rel="next">{page}</a>
		',
		'last' => '
			<span class="last">
				{link}
			</span>
		',
		'last-marker' => '&raquo;&raquo;',
		'last-link' => '		
			<a href="{uri}">{page}</a>
		',
		'last-inactive' => '',
		'last-inactive-link' => '',
	),
	'bootstrap3' => 
	array(
		'wrapper' => '
			<ul class="">
				{pagination}
			</ul>
		',
		'first' => '
		<li>{link}</li>',
		'first-marker' => '&laquo;&laquo;',
		'first-link' => '<a href="{uri}">{page}</a>',
		'first-inactive' => '',
		'first-inactive-link' => '',
		'previous' => '
		<li>{link}</li>',
		'previous-marker' => '&laquo;',
		'previous-link' => '<a href="{uri}" rel="prev">{page}</a>',
		'previous-inactive' => '
		<li class="disabled">{link}</li>',
		'previous-inactive-link' => '<a href="#" rel="prev">{page}</a>',
		'regular' => '
		<li>{link}</li>',
		'regular-link' => '<a href="{uri}">{page}</a>',
		'active' => '
		<li class="active">{link}</li>',
		'active-link' => '<a href="#">{page} <span class="sr-only"></span></a>',
		'next' => '
		<li>{link}</li>',
		'next-marker' => '&raquo;',
		'next-link' => '<a href="{uri}" rel="next">{page}</a>',
		'next-inactive' => '
		<li class="disabled">{link}</li>',
		'next-inactive-link' => '<a href="#" rel="next">{page}</a>',
		'last' => '
		<li>{link}</li>',
		'last-marker' => '&raquo;&raquo;',
		'last-link' => '<a href="{uri}">{page}</a>',
		'last-inactive' => '',
		'last-inactive-link' => '',
	),
	'bootstrap' => 
	array(
		'wrapper' => '
			<div class="pagination">
				<ul>{pagination}
				</ul>
			</div>
		',
		'first' => '
		<li>{link}</li>',
		'first-marker' => '&laquo;&laquo;',
		'first-link' => '<a href="{uri}">{page}</a>',
		'first-inactive' => '',
		'first-inactive-link' => '',
		'previous' => '
		<li>{link}</li>',
		'previous-marker' => '&laquo;',
		'previous-link' => '<a href="{uri}" rel="prev">{page}</a>',
		'previous-inactive' => '
		<li class="disabled">{link}</li>',
		'previous-inactive-link' => '<a href="#" rel="prev">{page}</a>',
		'regular' => '
		<li>{link}</li>',
		'regular-link' => '<a href="{uri}">{page}</a>',
		'active' => '
		<li class="active">{link}</li>',
		'active-link' => '<a href="#">{page}</a>',
		'next' => '
		<li>{link}</li>',
		'next-marker' => '&raquo;',
		'next-link' => '<a href="{uri}" rel="next">{page}</a>',
		'next-inactive' => '
		<li class="disabled">{link}</li>',
		'next-inactive-link' => '<a href="#" rel="next">{page}</a>',
		'last' => '
		<li>{link}</li>',
		'last-marker' => '&raquo;&raquo;',
		'last-link' => '<a href="{uri}">{page}</a>',
		'last-inactive' => '',
		'last-inactive-link' => '',
	),
);

/* End of file pagination.php */