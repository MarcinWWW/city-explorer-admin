package Tests.TestCases;

import org.testng.annotations.Test;
import static org.testng.Assert.assertEquals;
import static org.testng.Assert.assertNotSame;
import static org.testng.Assert.assertTrue;

import java.util.Random;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.interactions.Actions;
import org.testng.Assert;
import org.testng.annotations.AfterMethod;
import org.testng.annotations.AfterTest;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import Tests.PageObjects.FrontPage;


public class addThenDeleteBeaconCase {
	
	WebDriver driver;
	FrontPage objFront;
	@BeforeTest
	public void setup() {
		System.setProperty("webdriver.chrome.driver", "D:\\Selenium\\chromedriver.exe");	//PRACA
		driver = new ChromeDriver();
		driver.manage().window().maximize();
		driver.get("https://cityexplorer.000webhostapp.com/");
	}
	
	Random ran = new Random();
	int nxt = ran.nextInt(99999);
	int id = ran.nextInt(999);
	
	@Test
	public void addThenDeleteBeacon() throws InterruptedException {
		objFront = new FrontPage(driver);
		objFront.setLogin("admin");
		objFront.setPassword("admin");
		objFront.login();
		objFront.addFile("akcja testowa");
		objFront.setMajorID(id);
		objFront.setMinorID(id);
		objFront.setBcnName("beacon nr." +nxt);
		objFront.setBcnGrp("grupa Test");
		objFront.setBcnLoc("miasto Test");
		objFront.setBcnAddr("ulica Test");
		objFront.newBeacon();
		Thread.sleep(1000);
		objFront.bcnList();
		WebElement createdBeacon=driver.findElement(By.xpath("//div[contains(text(),'"+objFront.getBcnName()+"')]"));
		Actions actions = new Actions(driver);
		actions.moveToElement(createdBeacon);
		actions.perform();
		WebElement deleteBeacon=driver.findElement(By.xpath("//div[contains(text(),'"+objFront.getBcnName()+"')]/../div[8]/img[1]"));
		deleteBeacon.click();
		driver.switchTo().alert().accept();
		//assertEquals(createdBeacon.isDisplayed(), false);
		
	}

	
/*	@AfterMethod
	public void closeDriver() throws InterruptedException {
		objFront = new FrontPage(driver);
		Thread.sleep(1000);
		objFront.logout();
        System.out.println("Test przeprowadzony prawid³owo, Beacon zosta³ dodany, a nastêpnie usuniêty.");
        driver.quit();
    }*/
}
