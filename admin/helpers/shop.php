<?php

defined( '_JEXEC' ) or die;

class ShopHelper
{
	static function addSubmenu( $vName )
	{
		JHtmlSidebar::addEntry(
			JText::_( 'COM_SHOP_SUBMENU_PRODUCTS' ),
			'index.php?option=com_shop&view=products',
			$vName == 'goods' );

		JHtmlSidebar::addEntry(
			JText::_( 'COM_SHOP_SUBMENU_CATEGORIES' ),
			'index.php?option=com_shop&view=categories',
			$vName == 'categories' );

		JHtmlSidebar::addEntry(
			JText::_( 'COM_SHOP_SUBMENU_DISCOUNTS' ),
			'index.php?option=com_shop&view=discounts',
			$vName == 'discounts' );

		JHtmlSidebar::addEntry(
			JText::_( 'COM_SHOP_SUBMENU_DELIVERIES' ),
			'index.php?option=com_shop&view=deliveries',
			$vName == 'deliveries' );

		JHtmlSidebar::addEntry(
			JText::_( 'COM_SHOP_SUBMENU_PAYMENTS' ),
			'index.php?option=com_shop&view=payments',
			$vName == 'payments' );

        JHtmlSidebar::addEntry(
            JText::_( 'COM_SHOP_SUBMENU_OPTIONS' ),
            'index.php?option=com_shop&view=options',
            $vName == 'options' );
	}
}